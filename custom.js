$(document).ready(function () {


    var chatBox={

        loadMyData: function(){
            $.ajax({
                type:'GET',
                url: username+'.json',
                success:function(data){

                    // console.log(typeof data);
                    string = "";

                    for(key in data)
                    {
                        for(let i = 0 ; i < data[key].length; i++)
                        {
                            if(data[key][i].name=="you")
                                string += '<div class=" chat self"> <span class="name" >You</span><br>';
                            else 
                                string += '<div class=" chat friend"> <span class="name" >'+data[key][i].name+'</span><br>';
                            
                            string += '<span class="time "> '+data[key][i].time+'</span>';
                            string += '<br><span class="comment">'+data[key][i].comment+' </span> </div>';

                        }
                        
                    }
                
                    // });
                    //     var arrayOfData = data.split(' ');
                    //     var string = '';
                    //   for(let i = 0; i< arrayOfData.length; i++)
                    //   {
                    //       if(i==0 && arrayOfData[i]=="name:")
                    //       {
                    //         if(arrayOfData[i+1]=="Me")
                    //         string += '<div class=" chat self"> <span class="name" >'+arrayOfData[i+1]+'</span><br>';
                    //         else
                    //         string += '<div class=" chat friend"> <span class="name">'+arrayOfData[i+1]+'</span><br>';

                    //         i++;
                    //       }
                    //       else if(arrayOfData[i]=="name:")
                    //       {
                    //         if(arrayOfData[i+1]=="Me")
                    //          string += '</span> </div><div class="chat self"><span class="name" > '+arrayOfData[i+1]+'</span><br>';
                    //          else
                    //          string += '</span> </div><div class="chat friend"><span class="name" > '+arrayOfData[i+1]+'</span><br>';

                    //          i++;
                    //       }
                    //       else if(arrayOfData[i]=='time:'){

                    //           string += '<span class="time ">'
                    //           for(let j =1 ; j<= 3; j++)
                    //           {
                    //           string += arrayOfData[i+j] + ' ';
                    //           }
                    //           string += '</span>'
                    //           i += 3;
                    //       }
                    //       else if(arrayOfData[i]=='comment:')
                    //       {

                    //           string += '<br><span class="comment">'
                    //       }
                    //       else
                    //       {
                    //           string += arrayOfData[i] + ' ';
                    //       }

                    //   }
                      
                      
                      $.ajax({

                        type:'GET',
                        url:username +'live.txt',
                        success: function(data){
                            
                            if(data ==="true")
                            {
                                $('#liveStatus').html('Someone is typing......');
                            }
                            else
                            {
                                $('#liveStatus').html("");
                            }
                        }
                      });
                      
                      $('#chatBox').html(string);
                    //   $('#chatBox').scrollTop($('#chatBox').height());
                    //   chatBox.loadMyData();
                }

            });

        },
        getTime: function() {
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
        },
        postDataThroughPhp: function(dataForMe,dataForYou)
        {
            $.ajax({
                type: 'POST',
                url: 'loadMyData.php',
                data: {dataForMe:dataForMe, dataForYou:dataForYou},
                success:function()
                {
                }
            })
        },
        submit: function()
        {

                let comment = $('#comment').val();

                let time = chatBox.getTime();
                var dataForMe = '{ "name": "You" , "time": "'+time+'", "comment": "'+comment+'",';
                var dataForYou = '{ "name": "'+name+'" , "time": "'+time+'", "comment": "'+comment+'",';
                chatBox.postDataThroughPhp(dataForMe,dataForYou);

                $('#comment').val('');
        }
    };


    $('#comment').keydown(function(Key){
        
            if($('#comment').val()==""|| (Key.keyCode==8 && $('#comment').val().length==1))    
            {
                makeStatusFalse();            
            }
    
        
        if(Key.keyCode>=32 && Key.keyCode <=126 || Key.keyCode==13) 
        {
            $.ajax({
                type:'POST',
                url: 'updateLiveStatus.php',
                data:{status:'true'},
                success:function(){
                    
                }
            })
        }
    });


    function  makeStatusFalse(){
        $.ajax({
            type:'POST',
            url: 'updateLiveStatus.php',
            data:{status:'false'},
            success:function(){
            }
        })
    }
  
    chatBox.loadMyData();
    console.log(username);
    $('#send').click(function(){
        chatBox.submit();
        makeStatusFalse();
    });

    $('#comment').focus();
    makeStatusFalse();
  

});