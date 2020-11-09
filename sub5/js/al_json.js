    var xhr = new XMLHttpRequest();       // XMLHttpRequest 객체를 생성한다.

    xhr.onload = function() {           // When readystate changes

      //if(xhr.status === 200) {                      // If server status was ok
        responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
    
      // alert(responseObject.menus[0].image);   
	                                                 // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.

        var newAlMenus = '';
        
        for (var i = 0; i < responseObject.almenus.length; i++) { 
          newAlMenus += '<dl>';
          newAlMenus += '<dt>' + responseObject.almenus[i].name + ' ';
          newAlMenus += '<span>'+ responseObject.almenus[i].alInfo + '</span></dt>';
          newAlMenus += '<dd>' + responseObject.almenus[i].price + '</dd>';
          newAlMenus += '<dd>' + responseObject.almenus[i].detail + '</dd>';
          newAlMenus += '<dd class="match">' + responseObject.almenus[i].alMatch + '</dd>';          
          newAlMenus += '</dl>';
        } 
        document.getElementById('bvAlMenu').innerHTML = newAlMenus;
      //}
    };

    xhr.open('GET', 'data/aldata.json', true);        // 요청을 준비한다.
    xhr.send(null);   // 요청을 전송한다.