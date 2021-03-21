<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>
<body>
    
    <div class="container">
        <input type="text" name="q" class="form-control my-3 search-input">
        <div class="card">
            <div class="card-header">
                Search Result
            </div>
            <div class="list-group list-group-flush search-result">
               
            </div>
        </div>

    </div>

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script>
   
      
            $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
            });
            $(".search-input").on('keyup',function(){
                var _q = $(this).val();
                if(_q.length>=3){
                    $.ajax({
                        url:'/search/',
                        data:{
                            q:_q
                        },
                        type:'GET',
                        dataType:'json',
                        beforeSend:function(){
                            $(".search-result").html('<li class="list-group-item">Loading ... </li>')
                        },
                        success:function(res){
                            console.log(res);
                            var _html = '';
                        for(let i = 0;i<res.length;i++){
                            console.log(res[i].task_title);
                            _html+="<li class='list-group-item'>"+ res[i].task_title+"</li>";
                        }
                        
                            // $.each(res.data,function(index,data){
                            //     _html +='<li class="list-group-item">'+data.task_title+'</li>';
                            // });
                             $(".search-result").html(_html);
                            
                            
                        }
                    });
                }
            });
       
    </script>
    
</body>
</html>