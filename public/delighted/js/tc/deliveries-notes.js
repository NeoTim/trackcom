

var fixHelper = function (e, ui) {
    ui.children().each(function () {
        $(this).width($(this).width());
    });
    return ui;
};
$("#thingList tbody").sortable({
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

var db = 'https://tracom-data.firebaseio.com/things';
var ref = new Firebase(db);

var count; // global, there must be a better solution
// simply counts all children
ref.on('value', function (snapshot) {
    count = 0;
    snapshot.forEach(function () {
        count++;
    });

});


$('#thingTitle').keypress(function (e) {
    if (e.keyCode == 13) {
        var thingTitle = $('#thingTitle').val();
        // var thingAbstract = $('#thingAbstract').val();
        ref.push({
            thingTitle: thingTitle,
            // thingAbstract: thingAbstract
            ".priority": count
        });
        $('#thingTitle').val('');
        // $('#thingAbstract').val('');
    }
});

$('.editable').keypress(function (e) {
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
});

ref.limit(10).on('child_added', function (snapshot) {
    console.log(snapshot.val());

    // console.log(thing)
    var title = snapshot.val().thingTitle;
    var order = snapshot.getPriority();

    var icon1 = '<td class="showrecord incomplete"><i class="fa fa-circle-o"> </i></td>';
    
    if(snapshot.val().complete){
        icon1 = '<td class="showrecord complete"><i class="fa fa-check"> </i></td>';
    }
    var line = '<td class="showrecord">' + title + '</td>';
    var icon2 = '<td class="removeButton"><i class="fa fa-times"> </i></td>';

    $('#thingList').append('<tr id=id' + snapshot.name() + '>' + icon1 + line + icon2 + '</tr>');

    $('#thingList')[0].scrollTop = $('#thingList')[0].scrollHeight;
});


ref.on('child_changed', function (snapshot, prevChildName) {
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
    var icon2 = '<td class=removeButton><i class="fa fa-times"> </i></td>';

    // update the appropriate row
    $('#id' + id).html(icon1 + line + icon2);

    // if it is displayed in the detail view, update also.
    if (id == $('#contentId').html()) {
        $('#contentAbstract').html(snapshot.val().thingAbstract);
        $('#contentTitle').html(snapshot.val().thingTitle);
    }
});



ref.limit(20).on("child_removed", function (snapshot) {
    console.log('deleting ' + snapshot.name())
    $('#id' + snapshot.name()).remove()
});

ref.on('child_moved', function (snapshot, prevChildName) {
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

        $("#thingList").sortable().disableSelection();
        $("#thingList tbody tr:eq(" + currentTableIndex + ")").insertBefore($("#thingList tbody tr:eq(" + prevTableIndex + ")"));
    }


    // var id = $(this).parent().attr("id").substring(2)
    // get rowIndex, the jquery way, just a test
    // console.log($(this).parent().prevAll().length);



    // console.log( $('#thingList tbody') );
    // $('#thingList').append('<tr id="test"><td>test</td></tr>');

    // $("#thingList tbody").sortable( "refresh" );
});

$("#thingList").on('click', '.removeButton', function () {
    var id = $(this).parent().attr("id").substring(2)
    // console.log(id);
    ref.child(id).once('value', function (snapshot) {
        snapshot.ref().remove();
    });

});

$("#thingList .addButton").on('click', function () {
    var t = ($('#thingTitle').val() == "") ? "(enter title)" : $('#thingTitle').val();
    var newThing = ref.push({
        thingTitle: t,
        thingAbstract: "(enter text)",
            ".priority": count
    });
    // newThing.setPriority(1);

});
$("#thingList").on('click', '.incomplete', function () {
    var id = $(this).parent().attr("id").substring(2);
    ref.child(id).child('complete').set(true);
    // newThing.setPriority(1);
});
$("#thingList").on('click', '.complete', function () {
    var id = $(this).parent().attr("id").substring(2);
    ref.child(id).child('complete').set(false);
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
