/*
@Parm{data} JSON
@Parm{divId} string
@Parm{logedIn} bool
@Returns{html} string
*/
function MakeTable(data, divId, logedIn) {
  var Players = data.Staff;
  var thead = data.thead;
  var el = document.getElementById(divId);
  var string = '<thead>\
                  <tr>\
                    <td><strong>'+thead[0]+'</strong></td>\
                    <td><strong>'+thead[1]+'</strong></td>\
                    <td><strong>'+thead[2]+'</strong></td>\
                    <td><strong>'+thead[3]+'</strong></td>\
                  </tr>\
                </thead>\
                <tbody>';
  if(logedIn) {
    for (var i = 0; i < Players.length; i++) {
      var imgPlayer;
      if(Players[i].mcName == "") {
        imgPlayer = "char";
      } else {
        imgPlayer = Players[i].mcName;
      }
      string += '<tr id="table_'+i+'" class="inputRule">\
                  <td><img id="img_'+i+'" src="https://minotar.net/helm/'+imgPlayer+'/100.png"></td>\
                  <td><input type="text" class="textarea_tbl" id="mcName_'+i+'"value="'+Players[i].mcName+'"></td>\
                  <td><input type="text" class="textarea_tbl" id="rank_'+i+'"value="'+Players[i].rank+'"></td>\
                  <td><input type="text" class="textarea_tbl" id="twitter_'+i+'" value="'+Players[i].twitter+'"></td>\
                  <td><button id="del_'+i+'" class="btn btn-secondary left del" data-user="'+Players[i].mcName+'"><i class="fa fa-trash" style="font-size:48px;color:red;"></i></button></td>\
                </tr>';
    }
  } else {
    for (var i = 0; i < Players.length; i++) {
      string += '<tr id="table_'+i+'">\
                  <td class="animated zoomIn"><img src="https://minotar.net/helm/'+Players[i].mcName+'/100.png"></td>\
                  <td class="animated zoomIn">'+Players[i].mcName+'</td>\
                  <td class="animated zoomIn">'+Players[i].rank+'</td>\
                  <td class="animated zoomIn"><a href="https://twitter.com/'+Players[i].twitter+'"><p>'+Players[i].twitter+'</p></a></td>\
                </tr>';
    }
  }
  string += '</tbody>';
  el.innerHTML = string;
  if(logedIn) {
    $( ".del" ).click(function() {
      removeInput(this.id, data, logedIn);
      MakeTable(data, "staffTable", logedIn);
    });
    $('.textarea_tbl').each(function() {
      var elem = $(this);

      // Save current value of element
      elem.data('oldVal', elem.val());

      // Look for changes in the value
      elem.bind("propertychange change click keyup input paste", function(event){
         // If value has changed...
         if (elem.data('oldVal') != elem.val()) {
          // Updated stored value
          elem.data('oldVal', elem.val());

          value = elem.val();
          updateInput(this.id, value);
        }
      });
    });
  }
}
function MakeFooter(page) {
  if(page == "index") {
    var img = "img";
  } else {
    var img = "../img";
  }
  var footer = '<div class="row footer">\
                  <img class="img-responsive" src="'+img+'/logo.jpg" alt="footer logo img" />\
                  <span>Copyright &copy; XyloCraft 2016</span>\
                  <div style="float:right">\
                  <!-- tweet button -->\
                      <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.rvdutchman.xyz/XyloCraft" data-text="Come and you the XyloCraft community" data-via="XyloSupport" data-size="large">Tweet</a>\
                      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>\
                  <!-- follow button -->\
                      <a href="https://twitter.com/XyloSupport" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @XyloSupport</a>\
                      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>\
                  <!-- tweet naar -->\
                      <a href="https://twitter.com/intent/tweet?screen_name=XyloSupport" class="twitter-mention-button" data-size="large" data-related="PotterFreakRoy">Tweet to @XyloSupport</a>\
                      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>\
                </div>';
  document.getElementById('footer').innerHTML = footer;
}
/*
@Parm{id} int
@Parm{array} array
*/
function removeInput(id, jsonData, logedIn) {

  var idSplit = id.split("_");
  var newid = idSplit[1];
  var element = document.getElementById("mcName_"+newid);
  var username = element.value;
  if (username == "") {
    username = "steve";
  }
  Confirm.render('Do you want to delete: ' + username + '?','delete_post',newid);
  $( "#btnYes" ).click(function() {
    MakeTable(jsonData, "staffTable", logedIn);
  });
}
function updateInput(id, value) {
  var newid = id.split('_');
  var update;
    switch(newid[0]) {
      case 'mcName':
          Staff[newid[1]].mcName = value;
          var el = document.getElementById('img_'+newid[1]);
          el.removeAttribute('src');
          if(value == "") {
            value =  "char";
          }
          el.setAttribute("src", "https://minotar.net/helm/"+value+"/100.png");
          break;
      case 'rank':
          Staff[newid[1]].rank = value;
          break;
      case 'twitter':
          Staff[newid[1]].twitter = value;
          break;
      default:
          alert("Hey your IP adress has been send to spammers HIHI");
    }
}
/*
@Parm{id} int
@Makes{JSON} Staff.json
*/
function saveAll() {
    var jsonString = '{\n"title":' + JSON.stringify(title) + ',\n"thead":' + JSON.stringify(thead) + ',\n"Staff":' + JSON.stringify(Staff) + '\n}';
    $.post('../update.php', {jsonData:jsonString}).done(function(data)
    {
      location.reload();
    }
    );
}

/* custom Confirm object */
function CustomConfirm(){
	this.render = function(dialog,op,id){
		var winW = window.innerWidth;
	    var winH = window.innerHeight;
		var dialogoverlay = document.getElementById('dialogoverlay');
	    var dialogbox = document.getElementById('dialogbox');
		dialogoverlay.style.display = "block";
	    dialogoverlay.style.height = winH+"px";
		dialogbox.style.left = (winW/2) - (550 * .5)+"px";
	    dialogbox.style.top = "100px";
	    dialogbox.style.display = "block";

		document.getElementById('dialogboxhead').innerHTML = "XyloCraft admin panel";
	    document.getElementById('dialogboxbody').innerHTML = dialog;
		document.getElementById('dialogboxfoot').innerHTML = '<button id="btnYes">Yes</button> <button id="btnNo">No</button>';
    $( "#btnYes" ).click(function() {   Confirm.yes(op,id);    });
    $( "#btnNo" ).click(function() {   Confirm.no();   });
	}
	this.no = function(){
		document.getElementById('dialogbox').style.display = "none";
		document.getElementById('dialogoverlay').style.display = "none";
	}
	this.yes = function(op,id){
		if(op == "delete_post"){
      var element = document.getElementById("table_" + id);
      element.parentNode.removeChild(element);
      if(Staff[id] !== undefined && Staff[id] !== null) {
        Staff.splice(id, 1);
      }
		}
		document.getElementById('dialogbox').style.display = "none";
		document.getElementById('dialogoverlay').style.display = "none";
	}
}
