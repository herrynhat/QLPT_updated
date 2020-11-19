<header class="py-sm-3 pt-3 pb-2" id="home">
            <div class="container">
                <!-- nav -->
                <div class="top-w3pvt d-flex">
                    <div id="logo">
                        <h1>                          <span class="log-w3pvt">P</span>hòng trọ <span class="log-w3pvt">D&N</span><label class="sub-des">Tìm kiếm Online</label></h1>
                    </div>

                    <div class="forms ml-auto">
                        <?php if(!isset($_SESSION["user_id"])){ ?>
                         <a href="Login/getFormLogin" class="btn"><span class="fa fa-user-circle-o"></span> Đăng nhập</a>
                        <a href="Register/getFormRegister" class="btn"><span class="fa fa-pencil-square-o"></span> Đăng kí</a>
                    <?php }else{ ?>
                        <a class="btn"><span class="fa fa-user-circle-o"></span> Xin chào <?php echo $_SESSION["name"]; ?></a>
                        <a href="#ex1" rel="modal:open">Gợi ý kết bạn</a>  
                        <a href="myqrcode.php">MyQRCode</a>

                      <div id="ex1" class="modal">
                        <input type="hidden" name="" id="userlogin_id" value="<?php echo $_SESSION["user_id"]; ?>">
                        <?php $a = new User; ?>
                        <?php foreach($data["getNoFriends"] as $nf){ ?> 
                            <?php 
                              if(empty($nf->relationship->bsonSerialize()))
                              {
                                echo $nf->username . '<span><input type="button" class="btn btn-success addFr-request" id="'.$nf->user_id.'" value="Thêm bạn bè"></span>' . '<br>';
                              }
                              else
                              {
                                
                                $b = $a->checkIfSender($nf->user_id);
                                $c = $a->checkIfReceiver($nf->user_id);
                                if(gettype($b) == 'object')
                                {
                                 echo $nf->username . '<span><input type="button" class="btn btn-warning acceptFr-request" id="'.$nf->user_id.'" value="Chấp nhận ngay."></span>' . '<br>';
                                }
                                elseif(gettype($c) == 'object')
                                {
                                  echo $nf->username . '<span><input type="button" class="btn btn-primary" id="user_'.$nf->user_id.'" value="Đang chờ chấp nhận." readonly="readonly"></span>' . '<br>';
                                }
                                else
                                {
                                  echo $nf->username . '<span><input type="button" class="btn btn-success addFr-request" id="'.$nf->user_id.'" value="Thêm bạn bè"></span>' . '<br>';
                                }
                                // echo $nf->username . '<span><input type="button" class="btn btn-success addFr-request" id="'.$nf->user_id.'" value="Thêm bạn bè"></span>' . '<br>';
                                // foreach($nf->relationship as $r)
                                // {
                                //   // echo $r->friend_id . '<br>';
                                //   // echo $r->status . '<br>';
                                //   if($r->friend_id == $_SESSION["user_id"] && $r->status == "s"){// s == sender request
                                //     echo $nf->username . '<span><input type="button" class="btn btn-warning" id="user_'.$nf->user_id.'" value="Chấp nhận ngay."></span>' . '<br>';
                                //   }
                                //   elseif($r->friend_id == $_SESSION["user_id"] && $r->status == "r"){
                                //     echo $nf->username . '<span><input type="button" class="btn btn-primary" id="user_'.$nf->user_id.'" value="Đang chờ chấp nhận."></span>' . '<br>';
                                //   }
                                // }
                              }
                             ?>
                            
                        <?php } ?>
                        <a href="#" rel="modal:close">Close</a>
                      </div>

                        <a href="Login/logout" class="btn">Đăng xuất</a>
                    <?php } ?>
                    </div>
                </div>
                <div class="nav-top-wthree">
                    <nav>
                        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li><a href="contact.html">Về chúng tôi</a></li>
                        </ul>
                    </nav>
                    <!-- //nav -->
                    <div class="search-form ml-auto">
                        <div class="form-w3layouts-grid">
                            <form action="TrangChu/TimKiem" method="post" class="newsletter" style="background: #74D2E7">
                                &nbsp;&nbsp;&nbsp;
                                <select id="quan" name="quan">
                                    <option selected value="0">Chọn quận</option>
                                      <option value="Quận 1">Quận 1</option>
                                      <option value="Quận 2">Quận 2</option>
                                      <option value="Quận 3">Quận 3</option>
                                      <option value="Quận 4">Quận 4</option>
                                      <option value="Quận 5">Quận 5</option>
                                      <option value="Quận 6">Quận 6</option>
                                      <option value="Quận 7">Quận 7</option>
                                      <option value="Quận 8">Quận 8</option>
                                      <option value="Quận 9">Quận 9</option>
                                      <option value="Quận 10">Quận 10</option>
                                      <option value="Quận 11">Quận 11</option>
                                      <option value="Quận 12">Quận 12</option>
                                      <option value="Quận Bình Tân">Quận Bình Tân</option>
                                      <option value="Quận Bình Thạnh">Quận Bình Thạnh</option>
                                      <option value="Quận Gò Vấp">Quận Gò Vấp</option>
                                      <option value="Quận Phú Nhuận">Quận Phú Nhuận</option>
                                      <option value="Quận Tân Bình">Quận Tân Bình</option>
                                      <option value="Quận Tân phú">Quận Tân phú</option>
                                      <option value="Quận Thủ Đức">Quận Thủ Đức</option>
                                </select>
                                &nbsp;&nbsp;&nbsp;
                                <select id="gia" name="gia">
                                    <option selected value="0">Chọn giá</option>
                                    <option value="1">Dưới 500k</option>
                                    <option value="2">500k - 700k</option>
                                    <option value="3">Trên 700k</option>
                                </select>
                                &nbsp;&nbsp;&nbsp;
                                <input type="submit" name="" value="Lọc" >
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </header>

        <script type="text/javascript">
          $(document).ready(function(){
            var addFr_id = null;
            var accept_id = null;
            var userlogin_id = null;



            Pusher.logToConsole = true;

            var pusher = new Pusher('ed3cf9bac608e3b56afa', {
              cluster: 'eu'
            });

            var channel = pusher.subscribe('sendFriendRequest');
            channel.bind('FriendsRequestEvent', function(data) {
              userlogin_id = $('#userlogin_id').val();
              if(data["to"] == userlogin_id)
              {
                $('#' + data["from"]).val("Chấp nhận nào");
                $('#ex1').append('Bạn có lời mời kết bạn từ ' + data["from"]);

              }
            });

            $('.addFr-request').on('click', function(){
              addFr_id = $(this).attr("id");
              $(this).val("Hủy");
              $.ajax({
                url:"User/sendAddFreRequest",
                method: "post",
                data: {addFr_id: addFr_id},
                success: function(data){
                
                }
              });
            });

            $('.acceptFr-request').on('click', function(){
              accept_id = $(this).attr('id');
              $.ajax({
                url:"User/acceptAddFreRequest",
                method: "post",
                data: {accept_id: accept_id},
                success: function(data){
                
                }
              });
            });
          });
        </script>