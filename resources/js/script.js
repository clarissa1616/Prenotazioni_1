if (document.querySelector('#view-home')) {
    let view_home = document.querySelector('#view-home');
    let navbar = document.querySelector('#navbar');
    let nav_toggle = document.querySelector('#navbarToggleExternalContent');
    let main_video_container = document.querySelector('#main-video-container');
    let main_video = document.querySelector('#main-video');
    let width = window.innerWidth;
    if (width < 768) {
        main_video.pause();
        main_video_container.classList.add('d-none');
        view_home.classList.remove('d-none');
    }
    let height = window.innerHeight;
    let vids = [document.querySelector('#vid-tl'), document.querySelector('#vid-tr'), document.querySelector('#vid-br')];
    let col_vid_tl = document.querySelector('#col-vid-tl');
    let offX = col_vid_tl.offsetWidth;
    let offY = col_vid_tl.offsetHeight;
    window.addEventListener('resize', function() {
        width = window.innerWidth;
        height = window.innerHeight;
        offX = col_vid_tl.offsetWidth;
        offY = col_vid_tl.offsetHeight;
    });
    window.addEventListener('mousemove', e => {
        if (!nav_toggle.classList.contains('show')) {
            if (e.pageX < offX) {
                if (e.pageY < offY) {
                    vids[0].play();
                    vids[1].pause();
                    vids[2].pause();
                } else {
                    vids[0].pause();
                    vids[1].pause();
                    vids[2].pause();
                }
            } else {
                if (e.pageY < offY) {
                    vids[0].pause();
                    vids[1].play();
                    vids[2].pause();
                } else {
                    vids[0].pause();
                    vids[1].pause();
                    vids[2].play();
                }
            }
        } else {
            vids[0].pause();
            vids[1].pause();
            vids[2].pause();
        }
    });

    main_video.onended = function() {
        main_video.pause();
        main_video_container.classList.add('d-none');
        view_home.classList.remove('d-none');
        offX = col_vid_tl.offsetWidth;
        offY = col_vid_tl.offsetHeight;
    };
    let skip_btn = document.querySelector('#main-video-skip');
    skip_btn.onclick = function() {
        main_video.pause();
        main_video_container.classList.add('d-none');
        view_home.classList.remove('d-none');
        offX = col_vid_tl.offsetWidth;
        offY = col_vid_tl.offsetHeight;
    };
    let pause_icon = document.querySelector('#main-video-pause-icon');
    let pause_btn = document.querySelector('#main-video-pause');
    let playing = true;
    pause_btn.onclick = function() {
        playing = !playing;
        if (playing) {
            main_video.play();
        } else {
            main_video.pause();
        }
        pause_icon.classList.toggle('fa-pause');
        pause_icon.classList.toggle('fa-play');
    };

    let booking_btn = document.querySelector('#bookingBtn');
    booking_btn.addEventListener('mouseenter', function() {
        $('#exampleModalCenter').modal('show');
    });
}






//script per rotta /booking
jQuery(function() { 

    if($('.booking_data').length > 0){
    
    function removeNumber(number){
        if(number > 0){
            number--;
            return number;
        }else{
            return number;
        }
    }

    let a = $('#n_adults').html().split(',')
    let b = $('#n_children').html().split(',')
    adN = 0;
    chN = 0;

    a.forEach(element => {
     adN += parseInt(element) 
    });
    
    b.forEach(element => {
     chN += parseInt(element) 
    });

    $('#n_adults').html(adN)
    $('#n_children').html(chN)

    $('.span_n_adults').html( $('#n_adults').html() )
    $('.span_n_children').html( $('#n_children').html() )

   $(document).on('click', '.btn_add_adults', function(){
      let n_adults =  parseInt($(this).prev().html()) + 1;
      $(this).prev().html(n_adults)
   })
  
   $(document).on('click', '.btn_remove_adults', function(){
       let n_adults =  removeNumber(parseInt($(this).next().html()));
      $(this).next().html(n_adults)
    });

    $(document).on('click','.btn_add_children', function(){
       let n_children =  parseInt($(this).prev().html()) + 1;
      $(this).prev().html(n_children)
    })

    $(document).on('click','.btn_remove_children', function(){
       let n_children =  removeNumber(parseInt($(this).next().html()));
      $(this).next().html(n_children)
    })

    $('#btn_add_room').on('click', function(){
        let booking= $('.booking_data').first().clone()
        $('.modal-body').append(booking)
    })

    $(document).on('click', '#btn_remove_room', function(){
        if($('.booking_data').length > 1){
        $('.booking_data').last().remove()
        }
    })


    $(document).on('click', '.close', function(){
      
      let nAdults = 0;
      let nChildren = 0;
      let valueAdults = "";  //[2,3,5]
      let valueChildren = "";

      $('.span_n_adults').each(function(i, el){
        nAdults += parseInt(el.innerHTML)
        valueAdults+= el.innerHTML + ',';
        $('#n_adults').html(nAdults)
      })
      valueAdults = valueAdults.substring(0, valueAdults.length -1);
      $('[name="n_adults[]"]').val(valueAdults)


      $('.span_n_children').each(function(i,el){
        nChildren += parseInt(el.innerHTML)
        valueChildren+= el.innerHTML + ',';
        $('#n_children').html(nChildren)
      })
      valueChildren = valueChildren.substring(0, valueChildren.length -1);
      $('[name="n_children[]"]').val(valueChildren)

      let valueRooms = $('.booking_data').length
      $('#n_rooms').html(valueRooms)
      $('[name="n_rooms"]').val(valueRooms)

    })
}

})

