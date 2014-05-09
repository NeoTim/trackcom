<?php

Event::listen(AllEntriesEventHandler::EVENT, "AllEntriesEventHandler");
Event::listen(UpdateEntriesEventHandler::EVENT, "UpdateEntriesEventHandler");
Event::listen(UpdateEntriesStatusEventHandler::EVENT, "UpdateEntriesStatusEventHandler");
Event::listen(StoreEntriesEventHandler::EVENT, "StoreEntriesEventHandler");
Event::listen(DeleteEntriesEventHandler::EVENT, "DeleteEntriesEventHandler");

Event::listen(StoreOrdersEventHandler::EVENT, "StoreOrdersEventHandler");
Event::listen(UpdateOrdersEventHandler::EVENT, "UpdateOrdersEventHandler");
Event::listen(UpdateMethodsEventHandler::EVENT, "UpdateMethodsEventHandler");
Event::listen(DeleteOrdersEventHandler::EVENT, "DeleteOrdersEventHandler");
Event::listen(UpdateDriversEventHandler::EVENT, "UpdateDriversEventHandler");
Event::listen(UpdateGroupsEventHandler::EVENT, "UpdateGroupsEventHandler");
Event::listen(StoreGroupsEventHandler::EVENT, "StoreGroupsEventHandler");
Event::listen(StoreBatchesEventHandler::EVENT, "StoreBatchesEventHandler");
Event::listen(UpdateBatchesEventHandler::EVENT, "UpdateBatchesEventHandler");
