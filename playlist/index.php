<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=.7">
    <meta name="og:image" content="VCNU1.png">
		<link rel="shortcut icon" type="image/png" href="VCNU1.png"/>
    <title><?php echo $playlistName = ($a = explode('/',getcwd()))[sizeof($a)-1] . ' playlist';?></title>
		<meta name="description" content="<?php echo $playlistName;?>">
    <style>
      body, html{
        border: 0;
        background-color: #0000;
        background-image: url(https://jsbot.whitehot.ninja/uploads/hVMqI.jpg);
        background-repead: no-repeat;
        background-attachment: fixed;
        background-size: 100vw 100vh;
        height: 100vh;
        overflow: hidden;
        color:#cfd;
        font-size: .85em;
        font-family: courier;
        margin: 0;
      }
      .bg_overlay{
        position: fixed;
        width: 100vw;
        height: 100vh;
        z-index: 0;
        top: 0;
        left: 0;
        background: #0008;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100vw 100vh;
        background-position: center center;
      }
      .headerLogo{
        border-radius: 10px;
        border: 1px solid #4f82;
        position: fixed;
        cursor: pointer;
        left: 10px;
        background-size: 200px 50px;
        background-repeat: no-repeat;
        background-position: center center;
        background-color: #4f84;
        background-image: url(playlist_logo.png);
        top: 10px;
        z-index: 100;
        width: 200px;
        height: 50px;
      }
      .main{
        text-align: center;
        padding-bottom: 100px;
        z-index: 10;
        top: 0;
        left: 0;
        position: relative;
        min-height: 100vh;
        width: 100%;
      }
      .deleteButton{
        border: none;
        border-radius: 5px;
        outline: none;
        cursor: pointer;
        background-size: 35px 35px;
        background-position: center center;
        background-repeat: no-repeat;
        background-color: #0000;
        width: 35px;
        min-width: 25px;
        height: 35px;
        margin-left: 15px;
        margin-right: 15px;
        background-image: url(https://jsbot.whitehot.ninja/uploads/XeGsK.png);
      }
      .songButton{
        border-radius: 15px;
        display: inline-block;
        border: none;
        max-width: calc(75% - 0px);
        min-width: calc(75% - 0px);
        cursor: pointer;
        color: #afa;
        font-family: courier;
        font-size: 2em;
        padding: 10px;
        margin: 10px;
        whitespace: normal;
        text-align: left;
        text-shadow: 1px 1px 2px #000;
        padding-left: 60px;
        padding-right: 5px;
        background-image: url(2ftyk1.png);
        background-color: #044;
        background-repeat: no-repeat;
        background-position: 10px center;
        background-size: 45px 45px;
      }
      .playerFrame{
        left: 0;
        top:0;
        margin-top:0px;
        width:100%;
        min-width: 600px;
        max-width: 70%;
        height:290px;
        border:none;
        vertical-align:top;
        border-radius: 10px;
      }
      input[type=checkbox]{
        transform: scale(2.0);
      }
      label{
        font-size: 2em;
      }
      .jumpButton{
        position: fixed;
        left: 0;
        top: 0;
        margin: 20px;
        border-radius: 5px;
        font-size: 16px;
        background: #408;
        color: #fff;
        border: none;
        z-index: 20;
        font-weight: 900;
        font-family: courier;
        cursor: pointer;
      }
      .trackButtons{
        margin-top: 20px;
        width:100%;
        min-width: 600px;
        max-width: 75%;
        display: inline-block;
        max-height: calc(100vh - 390px);
        overflow-x: hidden;
        overflow-y: auto;
      }
      .modal{
        position: fixed;
        width: 100vw;
        height: calc(100vh - 100px);
        padding-top: 100px;
        text-align: center;
        background: #001414e8;
        display: none;
        overflow-y: auto;
      }
      #addTrackModal{
        z-index: 100;
      }
      .addTrackButton{
        font-size: 16px;
        margin: 10px;
        width: calc(100% - 100px);
      }
      .normalButtons{
        border: none;
        border-radius: 5px;
        outline: none;
        background: #2fc6;
        color: #8fc;
        text-shadow: 2px 2px 2px #000;
        font-size: 24px;
        cursor: pointer;
        min-width: 150px;
        font-family: courier;
      }
      .closeButton{
        background: #300;
        color: #fcc;
      }
      .searchButton{
        background: #032;
        color: #8fc;
      }
      input[type=text]{
        font-size: 24px;
        background: #000;
        border: none;
        outline: none;
        font-family: courier;
        min-width: 400px;
        border-bottom: 1px solid #084;
        color: #ffc;
        text-align: center;
      }
      .audiocloud{
        background: #206;
      }
      a{
        color: #ff0;
        text-decoration: none;
        background: #002;
        border-radius: 5px;
        padding: 5px;
      }
      #searchResults{
        width: 800px;
        padding: 20px;
        padding-bottom: 100px;
        font-size: 24px;
        display: inline-block;
      }
      #audiocloudDiv{
        backgroundL #f00;
      }
      #youtubeDiv{
        backgroundL #04f;
      }
      .youtubeLogo{
        color: #fff;
        background: #f00;
        font-weight: 900;
      }
      #bufferedTrack{
        top: 348px;
        left: 50%;
        line-height: 16px;
        transform: translate(-50%);
        font-size: 18px;
        background: linear-gradient(90deg, #000, #0000);
        position: absolute;
        text-align: left;
        padding: 5px;
        break-word: break-all;
        width: 65%;
        color: #bbba;
      }
      .bufferTrackTitle{
        font-size: 16px;
        font-style: oblique;
        color: #aaa;
      }
      .loaded{
        background: #4f8c;
        color: #000;
        position: absolute;
        margin-top: -1px;
        margin-left: 5px;
        font-size: 16px;
        line-height: 16px;
        font-weight: 900;
      }
    </style>
  </head>
  <body>
    <div class="headerLogo" onclick="window.location.href='/public_playlists'" title="go to homepage"></div>
    <div class="bg_overlay"></div>
    <div id="addTrackModal" class="modal">
      <input
        spellcheck="false"
        type="text"
        autofocus
        onkeypress="searchMaybe(event)"
        id="searchBar"
      ><br>
      <div style="width: 300px;text-align: left;margin-left:auto;margin-right: auto;margin-top: 20px;">
        <label for="exactCB">
          <input type="checkbox" id="exactCB" oninput="toggleExact(this)">
          exact match
        </label><br>
        <label for="allWordsCB">
          <input type="checkbox" checked id="allWordsCB" oninput="toggleAllWords(this)">
          include all words
        </label>
      </div>
      <br><br><br>
      <button onclick="search()" class="searchButton normalButtons">search</button><br><br>
      <button onclick="closeModal('#addTrackModal')" class="closeButton normalButtons">close</button><br><br>
      <div id="searchResults"></div>
    </div>
    <div class="main">
      <br>
      <label for="shuffle">
        <input type="checkbox" checked id="shuffle" oninput="toggleShuffle(this)">
        shuffle
      </label>
      <button onclick="showModal('#addTrackModal')" class="normalButtons">add track(s)</button>
      <br><br>
      <div id="iframeDiv">
        <iframe
          class="playerFrame"
          src=""
        ></iframe>
      </div>
      <br><br>
      <div class="trackButtons"></div>
      <div id="bufferedTrack"><span style="color: #fff;">next track:</span><br></div>
    <script>
      Rn=Math.random
      userInteracted = false
      let searchBar = document.querySelector('#searchBar')
      let searchResults = document.querySelector('#searchResults')
      let allWordsCB = document.querySelector('#allWordsCB')
      let exactCB = document.querySelector('#exactCB')
      let iframeDiv = document.querySelector('#iframeDiv')
      let buffer_el = ''
      let nextRnd
      let shuffle = true
      let exact = false
      let allWords = true      
      let bufferedTrack=document.querySelector('#bufferedTrack')

      window.onkeydown=e=>{
        if(e.keyCode==27) closeModal('#addTrackModal')
      }

      searchMaybe=e=>{
        let sparam = searchBar.value
        if(e.keyCode==13 && sparam !== ''){
          search()
        }
      }
      
      addTrack=(id, source)=>{
        sendData = { id, source }
        //searchResults.innerHTML = ''
        //searchBar.value = ''
        //closeModal('#addTrackModal')
        setTimeout(()=>{
          alert("\nthe track is being added.\n\nif successful, it will appear in your list shortly, as if by magic...")
        }, 0)
        fetch('addTrack.php',{
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(sendData),
        }).then(res=>res.json()).then(data=>{
          if(data[0]){
            tracks = ['tracks/' + data[1], ...tracks]
            renderTracks()
          } else {
            alert('there was a problem adding the track!')
          }
        })
      }
      
      search=()=>{
        let sparam = searchBar.value
        sparam = searchBar.value
        if(!sparam) return
        sendData = { sparam, allWords, exact }
        fetch('search.php',{
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(sendData),
        }).then(res=>res.json()).then(data=>{
          if(data[0]){
            res = JSON.parse(data[2])
            searchResults.innerHTML=`search results [<a href="https://audiocloud.dweet.net" target="_blank">audiocloud</a>]<br><div id="audiocloudDiv">`
            res[0].map(v=>{
              searchResults.innerHTML+=`<button class="normalButtons addTrackButton audiocloud"
                onclick="addTrack(`+v.id+`, 'audiocloud')"
                title="description: `+v.description+`">`+v.trackName+`</button>`
            })
            if(!res.length) searchResults.innerHTML+='no results'
            searchResults.innerHTML+='<br><br><br>search results ['
            let sp = document.createElement('span')
            sp.innerHTML='youtube'
            sp.className='youtubeLogo'
            searchResults.appendChild(sp)
            searchResults.innerHTML+=`]<br><br></div><div id="youtubeDiv">`
            searchResponse = data[1]
            searchResponse.map(v=>{
              searchResults.innerHTML+=`<button class="normalButtons addTrackButton"
                onclick="addTrack('`+v.id+`', 'youtube')"
                title="description: `+v.description+`">`+v.snippet.title+`</button>`
            })
            if(!searchResponse.length) searchResults.innerHTML+='no results'
            searchResults.innerHTML+='</div>'
          } else {
            alert('there was a problem searching... :(')
          }
        })
      }
      
      closeModal=modal=>{
        document.querySelector(modal).style.display='none'
      }
      
      showModal=modal=>{
        document.querySelector(modal).style.display='block'
        searchBar.focus()
      }
      
      scrollUp=()=>{
        window.scrollTo(0, 0)
      }
      
      deleteTrack=idx=>{
        let trackName=(l=decodeURI(tracks[idx]).split('/'))[l.length-1]
        if(confirm("\n\nAre you SURE you want to do this????\n\nthis action is irreversible!")){
          sendData = { trackName }
          fetch('deleteTrack.php',{
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(sendData),
          }).then(res=>res.json()).then(data=>{
            if(data[0]){
              tracks=tracks.filter((q,j)=>j!=idx)
              setTimeout(()=>renderTracks(), 0)
            }else{
              alert("d'oh.\n\nthere was an error or summat")
            }
          })
        }
      }
      
      next = ''
      
      preloadNext=()=>{
        setTimeout(()=>{
          nextRnd = shuffle? Rn()*tracks.length|0 : (curIDX + 1)%tracks.length
          let nextTrackName=decodeURI(tracks[nextRnd].replaceAll('tracks/',''))
          let t=0
          let loadingTimer = setInterval(()=>{
            bufferedTrack.innerHTML='<span style="color: #afc;font-weight: 900;">next track:</span>'+" <span style=\"color: #aaa;font-weight: 900;\">(buffering"+('.'.repeat(t%8))+('&nbsp;'.repeat(8-(t%8)))+")</span>"+'<br>'+('&nbsp;'.repeat(4))+'<span class="bufferTrackTitle">'+nextTrackName+'</span>'
            t+=1
          }, 50)
          preload = new Audio()
          preload.style.position='absolute'
          preload.style.visibility='hidden'
          document.body.appendChild(preload)
          setTimeout(()=>{
            clearInterval(loadingTimer)
          }, 30000)
          setTimeout(()=>{
            preload.crossorigin="anonymous"
            preload.src = window.location.href + tracks[nextRnd] + (userInteracted ? '?autoplay' : '')
            preload.onloadeddata=()=>{
              clearInterval(loadingTimer)
              bufferedTrack.innerHTML='<span style="color: #afc;font-weight: 900;">next track:</span>'+` <span class="loaded">(loaded!)</span>`+'<br>'+('&nbsp;').repeat(4)+'<span class="bufferTrackTitle">'+nextTrackName+'</span>'
            }
          }, 5000)
        }, 0)
      }
      
      playTrack=idx=>{
        let src = '/index.php/' + window.location.href + tracks[idx] + (userInteracted ? '?autoplay' : '')
        console.log(idx, userInteracted, src)
        let el
        (el = document.querySelectorAll('.playerFrame')[0])
        preloadNext()
        postMessage(JSON.stringify({'userInteracted': userInteracted}))
        el.src = '/index.php/' + window.location.href + tracks[idx] + (userInteracted ? '?autoplay' : '')
      }
      
      curIDX = 0

      renderTracks=()=>{
        let trackDiv = document.querySelectorAll('.trackButtons')[0]
        trackDiv.innerHTML = ''
        tracks.map((v, i)=>{
          let tb = document.createElement('button')
          tb.className = 'songButton'
          tb.onclick = () =>{
            playTrack(curIDX = i)
          }
          tb.innerHTML = decodeURI(v.replaceAll('tracks/', '')) + '<br>'
          trackDiv.appendChild(tb)
          let db = document.createElement('button')
          db.className = 'deleteButton'
          db.onclick = () =>{
            deleteTrack(curIDX = i)
          }
          trackDiv.appendChild(db)
        })
      }

      postMessage=msg=>{
        let el
        (el = document.querySelectorAll('.playerFrame')[0])
        if(el.src.indexOf('index.php') != -1){
          el.contentWindow.postMessage(msg, '*')
        }
      }
      window.addEventListener('message', e => {
        console.log(e)
        const key = e.message ? 'message' : 'data';
        const data = e[key];
        switch(data){
          case 'ended':
            playTrack(shuffle ? nextRnd : curIDX=(curIDX+1)%tracks.length)
          break
          case 'playing':
            userInteracted = true
          break
        }
      },false);

      toggleShuffle=e=>{
        shuffle = e.checked
        preloadNext()
      }

      toggleExact=e=>{
        exact = e.checked
      }

      toggleAllWords=e=>{
        allWords = e.checked
      }


      tracks=['Depeche Mode - A Question Of Time (Official Video).mp3','Depeche Mode - Its No Good (Official Video).mp3','Depeche Mode - Strangelove (Official Video).mp3','Depeche Mode - Blasphemous Rumours (Official Video).mp3','Depeche Mode Just cant get enough | Archive INA.mp3','Depeche Mode - Stripped (Official Video).mp3','Depeche Mode - Enjoy The Silence (Official Video).mp3','Depeche Mode - Master And Servant (Official Video).mp3','Depeche Mode - Suffer Well (Official Video).mp3','Depeche Mode - Everything Counts (Official Video).mp3','Depeche Mode - People Are People (Official Video).mp3','Depeche Mode - Walking In My Shoes (Official Video).mp3','Depeche Mode - Freelove (Official Video).mp3','Depeche Mode - Personal Jesus (Official Video).mp3','Depeche Mode - Wheres the Revolution (Video).mp3','Depeche Mode - Get the Balance Right! (Official Video).mp3','Depeche Mode - Policy Of Truth (Official Video).mp3','Depeche Mode - World In My Eyes (Official Video).mp3','Depeche Mode - Heaven.mp3','Depeche Mode - Precious (,Official Video).mp3','Depeche Mode - I Feel You (Official Video).mp3','Depeche Mode - Shake The Disease (Official Video).mp3','Depeche Mode - In Your Room (Official Video).mp3','Depeche Mode - Should Be Higher (Live).mp3']

      tracks = tracks.map(v=> 'tracks/'+encodeURIComponent(v))


      vid = document.createElement('video')
      vid.style.position = 'absolute'
      vid.style.opacity = '0'
      vid.style.top = '0'
      vid.style.zIndex=-1;
      vid.style.mouseEvents = 'none'
      vid.style.left = '0'
      document.body.appendChild(vid)
      vid.src='sleepBuster.mp4'
      vid.loop=true
      vid.muted=true
      vid.play()
      renderTracks()
      nextRnd = Rn()*tracks.length|0
      playTrack(shuffle ? nextRnd : curIDX=(curIDX)%tracks.length)
    </script>
    </div>
  </body>
</html>
