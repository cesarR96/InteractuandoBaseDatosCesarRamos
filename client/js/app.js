
$(function(){
  initForm();
  obtenerDataInicial();
});

function initForm(){
  $('#start_date, #titulo, #end_date').val('');
  $('#start_date, #end_date').datepicker({
    dateFormat: "yy-mm-dd"
  });
  $('.timepicker').timepicker({
    timeFormat: 'HH:mm',
    interval: 30,
    minTime: '5',
    maxTime: '23:30',
    defaultTime: '7',
    startTime: '5:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
  });
  //si esta activado todo el dia
  $('#allDay').on('change', function(){
    if (this.checked) {
      $('.timepicker, #end_date').attr("disabled", "disabled")
    }else {
      $('.timepicker, #end_date').removeAttr("disabled")
    }
  })
}//fin init form

        

function obtenerDataInicial() {
  let url = '../server/getEvents.php'
  $.ajax({
    url: url,
    cache: false,
    type: 'GET',
    success: (data) =>{

      if (data) {
        data = JSON.parse(data)
        console.log(data)
        var json ;

                
        poblarCalendario(json);
      }else {
        alert(data)
        window.location.href = 'index.html';
      }
    },
    error: function(){
      alert("error en la comunicación con el servidor");
    }
  })
}

function poblarCalendario(eventos) {
     $('#calendar').fullCalendar({
        // put your options and callbacks here
        events:[{

          id:'27',
          title: 'Event1',
          start: '2018-01-10',
          editable: true,
          allday:false

        }],eventDrop: (event) => {
          this.actualizarEvento(event)
        },
        eventDragStart: (event,jsEvent) => {
          $('.delete-btn').find('img').attr('src', "img/trash-open.png");
          $('.delete-btn').css('background-color', '#a70f19')
        },
        eventDragStop: (event,jsEvent) =>{
          var trashEl = $('.delete-btn');
          var ofs = trashEl.offset();
          var x1 = ofs.left;
          var x2 = ofs.left + trashEl.outerWidth(true);
          var y1 = ofs.top;
          var y2 = ofs.top + trashEl.outerHeight(true);
          if (jsEvent.pageX >= x1 && jsEvent.pageX<= x2 &&
            jsEvent.pageY >= y1 && jsEvent.pageY <= y2) {
            this.eliminarEvento(event, jsEvent)
          $('.calendario').fullCalendar('removeEvents', event.id);
        }

          }//fin de evento      
        })
  }


function anadirEvento(){
      event.preventDefault();
      var form_data = new FormData();
      var vacia = false;
      var dia = 1;
      form_data.append('titulo', $('#titulo').val());
      form_data.append('start_date',$('#start_date').val());
      if (!document.getElementById('allDay').checked){
        form_data.append('allDay', document.getElementById('allDay').checked);
        form_data.append('end_date',$('#end_date').val());
        form_data.append('end_hour',$('#end_hour').val());
        form_data.append('start_hour',$('#start_hour').val());
      } else {
        form_data.append('allDay',dia);
        form_data.append('end_date',vacia);
        form_data.append('end_hour',vacia);
        form_data.append('start_hour',vacia);
      }
      $.ajax({
        url: '../server/new_event.php',
        dataType: "text",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(data){

         
          data = JSON.parse(data)
          if (data.msg=="OK") {
            alert('Se ha añadido el evento exitosamente')
          }else {
            alert(data.msg)
          }
        },
        error: function(){
          alert("error en la comunicación con el servidor");
        }
      })

    }

  function eliminarEvento(event, jsEvent){
      var id = event.id;
      $.ajax({
        url: '../server/delete_event.php',
        cache: false,
        data: {id:id},
        type: 'POST',
        success: (data) =>{
          console.log(data);
          data = JSON.parse(data);
          if (data.msg=="OK") {
            alert('Se ha eliminado el evento exitosamente')
          }else {
            alert(data.msg)
          }
        },
        error: function(){
          alert("error en la comunicación con el servidor");
        }
      })
      $('.delete-btn').find('img').attr('src', "img/trash.png");
      $('.delete-btn').css('background-color', '#8B0913')
    }

   function actualizarEvento(evento) {
        let id = evento.id,
            start = moment(evento.start).format('YYYY-MM-DD HH:mm:ss'),
            end = moment(evento.end).format('YYYY-MM-DD HH:mm:ss');

        var start_date = start.substr(0,10)
        var end_date = end.substr(0,10)
        var start_hour = start.substr(11,8)
        var end_hour = end.substr(11,8)

        $.ajax({
          url: '../server/update_event.php',
          cache: false,
          data: {start_date:start_date,end_date:end_date,start_hour:start_hour,end_hour:end_hour, id:id},
          type: 'post',
          success: (data) =>{
            data = JSON.parse(data);
            if (data.msg=="OK") {
              alert('Se ha actualizado el evento exitosamente')
            }else {
              alert(data.msg)
            }
          },
          error: function(){
            alert("error en la comunicación con el servidor");
          }
        })
    }


