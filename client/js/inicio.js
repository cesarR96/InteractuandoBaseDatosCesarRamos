$(document).ready(function() {

    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
        // put your options and callbacks here
       events:[{
          id:'1',
       	  title: 'Event1',
          start: '2017-12-12',
       	  editable: true,
          allday:false

        }
        
       ]//fin de evento      
    })

});




