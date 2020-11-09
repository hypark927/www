    var xhr = new XMLHttpRequest();       // XMLHttpRequest 객체를 생성한다.

    xhr.onload = function() {           // When readystate changes

      //if(xhr.status === 200) {                      // If server status was ok
        responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
    
      // alert(responseObject.menus[0].image);   
	                                                 // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.

        var newMenus = '';
        
        for (var i = 0; i < responseObject.fmenus.length; i++) { 
          newMenus += '<dl>';
          newMenus += '<dt><img src="' + responseObject.fmenus[i].photo + '" ';
          newMenus += 'alt="">' + responseObject.fmenus[i].name + ' ';
          newMenus += '<span>'+ responseObject.fmenus[i].fInfo + '</span></dt>';
          newMenus += '<dd>' + responseObject.fmenus[i].price + '</dd>';
          newMenus += '<dd>' + responseObject.fmenus[i].detail + '</dd>';
          newMenus += '<dd class="match">' + responseObject.fmenus[i].fMatch + '</dd>';          
          newMenus += '</dl>';
        } 
        document.getElementById('bvMenu').innerHTML = newMenus;
      //}
    };

    xhr.open('GET', 'data/menudata.json', true);        // 요청을 준비한다.
    xhr.send(null);   // 요청을 전송한다.