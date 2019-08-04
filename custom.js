$(document).ready(function () {



    var chatBox={
        username : "",
        password : "",
        login:function () {
            $('#login').click(function () {
                chatBox.username = $('#username').val();
                chatBox.password = $('#password').val();
               chatBox.match();
            });
        },
        match:function () {
            var flag = 0;
            $.ajax({
                type:'GET',
                url:'loginData.json',
                success:function (data) {
                    data = $.parseJSON(data);
                    console.log(data);
                    $.each(data,function (key,user) {
                        console.log(user)
                        console.log(chatBox.username, chatBox.password);
                        if(user['username'] == (chatBox.username) && user['password']==(chatBox.password))
                        {
                            
                            chatBox.creaTextFile();
                            $('.myBody').load('main.html');
                            flag =1;
                            chatBox.loadMyData();
                        }
                    });
                    if (flag==0)
                    alert("Invalid username and passowrd")
                }
            })
        },
        creaTextFile: function()
        {
            $.ajax({
                type: 'POST',
                url: 'createFile.php',
                dataType:'html',
                data: {username:chatBox.username},
                success:function (data) {
                    alert(data);
                }
            })
        },
        loadMyData: function(){
            console.log("Hello");
            $.ajax({
                type:'GET',
                url: chatBox.username+'.txt',
                success:function(data){
                      console.log(data);
                        var arrayOfData = data.split(' ');
                        var string = ''
                        console.log(arrayOfData);
                      for(let i = 0; i< arrayOfData.length; i++)
                      {
                          if(i==0 && arrayOfData[i]=="name:")
                          {
                              
                            string += '<li class="list-group-item"> <span class="name" style="font-size:14px; font-weight:bold">'+arrayOfData[i+1]+'</span><br>';
                            i++;
                          }
                          else if(arrayOfData[i]=="name:")
                          {
                             string += '</span> </li><li class="list-group-item"><span class="name" style="font-size:14px; font-weight:bold"> '+arrayOfData[i+1]+'</span><br>';
                             i++;
                          }
                          else if(arrayOfData[i]=='time:'){

                              string += '<span class="time text-muted">'
                              for(let j =1 ; j<= 3; j++)
                              {
                              string += arrayOfData[i+j] + ' ';
                              }
                              string += '</span>'
                              i += 3; 
                          }
                          else if(arrayOfData[i]=='comment:')
                          {

                              string += '<br><span class="comment">'
                          }
                          else
                          {
                              string += arrayOfData[i] + ' ';
                          }
                          

                          console.log(arrayOfData[i]);
                      }
                    
                      $('#chatBox').html(string);
                      console.log(string);
                }
            })
        },
        loadDataThroughPhp: function(dataForMe,dataForYou)
        {
            $.ajax({
                type: 'POST',
                url: 'loadMyData.php',
                data: {dataForMe:dataForMe, dataForYou:dataForYou},
                success:function()
                {
                    console.log("Data uploaded");
                }
            })
        },
        getTime: function() {
            var Month = ["Jan","Feb","March","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
            let DateAndTime = new Date();
            let month = DateAndTime.getMonth();
            let day = DateAndTime.getDate();
            let time = DateAndTime.getHours();
            let year= DateAndTime.getFullYear();
            let type;
            if(time>12)
                type  ="pm";
            else
                type = "am"
            if(time==0)
                time = 12;
            else if (time>12)
    
            time -= 12;
            let  mint = DateAndTime.getMinutes();
    
            return(time+":"+mint + " "+type +" "+day+"-"+month+"-"+year);
        }
    };

    chatBox.login();

    $('#send').click(function(){
        let comment = $('#comment').val();

        let time = chatBox.getTime();
        var dataForMe = '\n name: Me \n time: '+time+' \n comment: '+comment+'';
        var dataForYou = '\n name: '+chatBox.username+' \n time: '+time+' \n comment: '+comment+'';
        console.log(dataForMe,dataForYou);
        console.log(time);
        console.log(chatBox.username);
        chatBox.loadDataThroughPhp(dataForMe,dataForYou);
    })
});