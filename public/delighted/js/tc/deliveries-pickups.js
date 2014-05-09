

var fixHelper = function (e, ui) {
    ui.children().each(function () {
        $(this).width($(this).width());
    });
    return ui;
};
$("#pickupList tbody").sortable({
    helper: fixHelper,
    update: function (event, ui) {
        for (var i = 0; $('#thingList tr:gt(0)').length; i++) {
            var id = $('#thingList tr:gt(0)').eq(i).attr('id').substring(2);
            var nameRef = new Firebase(db + '/' + id);
            nameRef.setPriority(i);
        }
    }

}).disableSelection();


$(".editable").each(function (index, element) {
    element.onclick = function (e) {
        this.contentEditable = true;
        this.focus();
        if (this.innerHTML == "(enter text)") {
            this.innerHTML = "";
        }
        if (this.innerHTML == "(enter title)") {
            this.innerHTML = "";
        }

    };
});

var db = 'https://tracom-data.firebaseio.com/pickups';
var pickupRef = new Firebase(db);

var count; // global, there must be a better solution
// simply counts all children
pickupRef.on('value', function (snapshot) {
    count = 0;
    snapshot.forEach(function () {
        count++;
    });

});


$('#pickupTitle').keypress(function (e) {
    if (e.keyCode == 13) {
        var thingTitle = $('#pickupTitle').val();
        // var thingAbstract = $('#thingAbstract').val();
        pickupRef.push({
            thingTitle: thingTitle,
            // thingAbstract: thingAbstract
            ".priority": count
        });
        $('#pickupTitle').val('');
        // $('#thingAbstract').val('');
    }
});

/*$('.editable').keypress(function (e) {
    if (e.keyCode == 13 && !e.shiftKey) {
        console.log(this);
        // console.log($('#contentId').html());

        var nameRef = new Firebase(db + '/' + $('#contentId').html());
        nameRef.set({
            thingTitle: $('#contentTitle').html(),
            thingAbstract: $('#contentAbstract').html(),
                ".priority": count
        });


        if ($('#contentAbstract').html() == "") {
            $('#contentAbstract').html() = "(enter text)";
        }
        this.contentEditable = false;
        $(this).blur();
        return false;
    }
});*/

pickupRef.limit(10).on('child_added', function (snapshot) {
    console.log(snapshot.val());

    // console.log(thing)
    var title = snapshot.val().thingTitle;
    var order = snapshot.getPriority();

    var icon1 = '<td class="showrecord incomplete"><i class="fa fa-circle-o"> </i></td>';
    
    if(snapshot.val().complete){
        icon1 = '<td class="showrecord complete"><i class="fa fa-check"> </i></td>';
    }
    var line = '<td class="showrecord">' + title + '</td>';
    var icon2 = '<td class="removeButton" id="remove'+snapshot.name()+'"><i class="fa fa-times"> </i></td>';

    $('#pickupList').append('<tr id=id' + snapshot.name() + '>' + icon1 + line + icon2 + '</tr>');

    $('#pickupList')[0].scrollTop = $('#pickupList')[0].scrollHeight;
    $("#remove" + snapshot.name()).on('click', function () {
        var id = $(this).parent().attr("id").substring(2);
        // console.log(id);
        console.log(id);
        pickupRef.child(id).remove();    

    });
});


pickupRef.on('child_changed', function (snapshot, prevChildName) {
    //console.log('child changed' + snapshot.val().thingTitle)
    //console.log('previous child' + prevChildName)
    var id = snapshot.name();

    var title = snapshot.val().thingTitle;
    var order = snapshot.getPriority();


    var icon1 = '<td class="showrecord incomplete"><i class="fa fa-circle-o"> </i></td>';
    var line = '<td class="showrecord">' + title + '</td>';
     if(snapshot.val().complete){
        icon1 = '<td class="showrecord complete"><i class="fa fa-check"> </i></td>';
        line = '<td class="showrecord"><strike>' + title + '</strike></td>';
    }
    var icon2 = $('<td class="removeButton" id="remove'+id+'"><i class="fa fa-times"> </i></td>');

    // update the appropriate row
    $('#id' + id).html(icon1 + line + icon2);

    // if it is displayed in the detail view, update also.
    /*if (id == $('#contentId').html()) {
        $('#contentAbstract').html(snapshot.val().thingAbstract);
        $('#contentTitle').html(snapshot.val().thingTitle);
    }*/

    $("#remove" + snapshot.name()).on('click', function () {
        var id = $(this).parent().attr("id").substring(2);
        // console.log(id);
        console.log(id);
        pickupRef.child(id).remove();    

    });
});



pickupRef.limit(20).on("child_removed", function (snapshot) {
    console.log('deleting ' + snapshot.name())
    $('#id' + snapshot.name()).remove()
});

pickupRef.on('child_moved', function (snapshot, prevChildName) {
    var name = snapshot.name(),
        data = snapshot.val();
    var where = (prevChildName === null) ? 'at the beginning' : 'after ' + prevChildName;
   // console.log('child ' + name + ' should now appear ' + where);


    // console.log( $("#id" + prevChildName).prevAll().length )

    var currentDbIndex = snapshot.getPriority(); // that's the order in the Firebase
    var currentTableIndex = $("#id" + name).prevAll().length // that's the order in the HTML table
    if (currentDbIndex != currentTableIndex) {
        // the change was not in this client. We need to re-oder the table.

        prevTableIndex = $("#id" + prevChildName).prevAll().length;

        console.log(currentTableIndex + "->" + prevTableIndex);

        $("#pickupList").sortable().disableSelection();
        $("#pickupList tbody tr:eq(" + currentTableIndex + ")").insertBefore($("#pickupthingList tbody tr:eq(" + prevTableIndex + ")"));
    }


    // var id = $(this).parent().attr("id").substring(2)
    // get rowIndex, the jquery way, just a test
    // console.log($(this).parent().prevAll().length);



    // console.log( $('#thingList tbody') );
    // $('#thingList').append('<tr id="test"><td>test</td></tr>');

    // $("#thingList tbody").sortable( "pickupRefresh" );
});

$(".removeButton").on('click', function () {
    var id = $(this).parent().attr("id").substring(2);
    // console.log(id);
    console.log(id);
    //pickupRef.child(id).remove();    

});

$("#addPickup").on('click', function () {
    var t = ($('#pickupTitle').val() == "") ? "(enter title)" : $('#pickupTitle').val();
    var newThing = pickupRef.push({
        thingTitle: t,
        thingAbstract: "(enter text)",
            ".priority": count
    });
    // newThing.setPriority(1);

});
$("#pickupList").on('click', '.incomplete', function () {
    var id = $(this).parent().attr("id").substring(2);
    pickupRef.child(id).child('complete').set(true);
    // newThing.setPriority(1);
});
$("#pickupList").on('click', '.complete', function () {
    var id = $(this).parent().attr("id").substring(2);
    pickupRef.child(id).child('complete').set(false);
    // newThing.setPriority(1);
});

/*$(document).on('click', '.showrecord', function () {
    var id = $(this).parent().attr("id").substring(2)
    // get rowIndex, the jquery way, just a test
    // console.log($(this).parent().prevAll().length);

    ref.child(id).once('value', function (snapshot) {
        $('#contentId').html(snapshot.name());
        $('#contentTitle').html(snapshot.val().thingTitle);

        if (snapshot.val().thingAbstract) {
            $('#contentAbstract').html(snapshot.val().thingAbstract);
        } else {
            $('#contentAbstract').html('(enter text)');
        }
    });

});
*/
