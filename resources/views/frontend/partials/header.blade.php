<div id="top11">
    <div class="container">
        <form class="navbar-form" id="frmsearch1" action="" method="POST" style="margin-top: 5px;margin-bottom: 5px;">
            <input style="     border-radius: 0;
                width: 66%;
                float: left;    border: none;
                box-shadow: none;
                height: 25px;" type="text" class="form-control" name="txtsearch" placeholder="Search" value=""
                onclick="this.value=''" onblur="if (this.value == '')  {this.value = '';}">
            <div class="input-group-btn">
                <button style="     background: #ffffff;
                    border-radius: 0;
                    font-size: 12px;
                    border: none;
                    color: #17479e;padding: 4px 18px;" class="btn btn-default" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div id="giohang">
            <span><a href=""><img  src="{{ asset('images/vietnam.png') }}"></a><a href="">
                <img  src="{{ asset('images/english.png') }}"></a>
            </span>
        </div>
    </div>
</div>
<div class="box-search">
    <a href="http://demo.cuv.com.vn/">
        @if(isset($banner))
        <img src="{{ asset($banner->image) }}" border="0" alt>
        @else
        <img  src="{{ asset('images/english.png') }}"></a>
        @endif
    </a>
</div>


<div id="menutop1">
    <div class="container " id="" style="">
        <div class="navbar" style="">
            <div id="smoothmenu3" class="ddsmoothmenu3">
                <ul>
                    <li style="border-left:none;">
                        <a href="http://demo.cuv.com.vn/"><span><i class="fas fa-home"></i></span> Trang chủ</a></li>
                    <li style=" "><a href="http://demo.cuv.com.vn/gioi-thieu.html">Giới thiệu</a></li>
                    <li style=" "><a href="http://demo.cuv.com.vn/san-pham.html">Sản phẩm</a>
                        <ul id="box098">
                            <li>
                                <ul>
                                    <!-- <div id="row-left"><img src="http://demo.cuv.com.vn/admin/img/catproduct/2018052123183283469d31a109c3b788af763f8353ff1f.png"></div> -->
                                    <div id="row-right"><a href="http://demo.cuv.com.vn/san-pham-nhap-khau.htm" class="sf-with-ul"> Sản phẩm nhập khẩu</a>
                                        <li><a href="http://demo.cuv.com.vn/may-lam-mat-keruilai.htm" class="sf-with-ul">Máy làm mát Keruilai</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/quat-sai-canh-dai-hvls-kale.htm" class="sf-with-ul">Quạt sải cánh dài HVLS Kale</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/thiet-bi-lam-mat-tu-dien-dindan.htm" class="sf-with-ul">Thiết bị làm mát tủ điện Dindan</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/cua-cuon-toc-do-cao-rollway.htm" class="sf-with-ul">Cửa cuốn tốc độ cao Rollway</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/quat-cong-nghiep-eurovent.htm" class="sf-with-ul">Quạt công nghiệp Eurovent</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/ong-gio-1.htm" class="sf-with-ul">Ống gió</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/thiet-bi-hut-bui-di-dong-1.htm" class="sf-with-ul">Thiết bị hút bụi di động</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <!-- <div id="row-left"><img src="http://demo.cuv.com.vn/admin/img/catproduct/201805212318372890f648b1437ef74f535212ce7787c3.png"></div> -->
                                    <div id="row-right"><a href="http://demo.cuv.com.vn/san-pham-lap-rap.htm" class="sf-with-ul"> Sản phẩm lắp rắp</a>
                                        <li><a href="http://demo.cuv.com.vn/ong-gio-cua-gio.htm" class="sf-with-ul">Ống gió - Cửa gió</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/tu-bang-dien-thang-mang-cap.htm" class="sf-with-ul">Tủ bảng điện, thang máng cáp</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/thiet-bi-hut-bui-di-dong-tu-hut-bui.htm" class="sf-with-ul">Thiết bị hút bụi di động, tủ hút bụi</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <!-- <div id="row-left"><img src="http://demo.cuv.com.vn/admin/img/catproduct/2018052123184111f26f3efee36d3d5d140d9a43ae8c00.png"></div> -->
                                    <div id="row-right"><a href="http://demo.cuv.com.vn/san-pham-hop-tac.htm" class="sf-with-ul"> Sản phẩm hợp tác</a>
                                        <li><a href="http://demo.cuv.com.vn/dieu-hoa-khong-khi.htm" class="sf-with-ul">Điều hoà không khí</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/may-nen-khi.htm" class="sf-with-ul">Máy nén khí</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/thap-giai-nhiet.htm" class="sf-with-ul">Tháp giải nhiệt</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/dong-co-dien.htm" class="sf-with-ul">Động cơ điện</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/may-hut-bui.htm" class="sf-with-ul">Máy hút bụi</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/bao-ho-lao-dong.htm" class="sf-with-ul">Bảo hộ lao động</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/thiet-bi-phong-sach.htm" class="sf-with-ul">Thiết bị phòng sạch</a>
                                        </li>
                                        <li><a href="http://demo.cuv.com.vn/dung-cu-cam-tay.htm" class="sf-with-ul">Dụng cụ cầm tay</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="http://demo.cuv.com.vn/tin-tuc/11/media" class="sf-with-ul"> Media</a>
                        <ul>
                        </ul>
                    </li>
                    <li><a href="http://demo.cuv.com.vn/tin-tuc/6/dich-vu" class="sf-with-ul"> Dịch vụ</a>
                        <ul>
                            <li><a href="http://demo.cuv.com.vn/tin-tuc/8/he-thong-thong-gio-dieu-hoa" class="sf-with-ul">Hệ thống thông gió, điều hoà </a>
                            </li>
                            <li><a href="http://demo.cuv.com.vn/tin-tuc/9/he-thong-co-dien" class="sf-with-ul">Hệ thống Cơ Điện</a>
                            </li>
                            <li><a href="http://demo.cuv.com.vn/tin-tuc/10/he-thong-phong-chay-chua-chay" class="sf-with-ul">Hệ thống phòng cháy chữa cháy</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="http://demo.cuv.com.vn/tin-tuc/1/tin-tuc" class="sf-with-ul"> Tin tức</a>
                        <ul>
                        </ul>
                    </li>
                    <li style="border-right:none;"><a href="http://demo.cuv.com.vn/lien-he"> Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <div class="menu-display" style="display: none;">
            {{-- <link rel="stylesheet" type="text/css" href="http://demo.cuv.com.vn/icon-font/css/font-awesome.css" /> --}}
            <i class="fa fa-bars" onclick="displaymenu();"></i>
            <div class="clear-main"></div>
            <input type="text" style="width: 0; height: 0; display: none;" id="input_tem" value="0" />
            <div class="menu-respon">
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <p> <a class="accordion-toggle" href="http://demo.cuv.com.vn/">Trang chủ
               </a></p>
                            <p> <a class="accordion-toggle" href="http://demo.cuv.com.vn/san-pham/98/san-pham-nhap-khau">Sản phẩm nhập khẩu                        </a></p>
                            <p> <a class="accordion-toggle" href="http://demo.cuv.com.vn/san-pham/99/san-pham-lap-rap">Sản phẩm lắp rắp                        </a></p>
                            <p> <a class="accordion-toggle" href="http://demo.cuv.com.vn/san-pham/100/san-pham-hop-tac">Sản phẩm hợp tác                        </a></p>
                            <p> <a class="accordion-toggle" href="http://demo.cuv.com.vn/tin-tuc.html">Tin tức
               </a></p>
                            <p> <a class="accordion-toggle" href="http://demo.cuv.com.vn/lien-he">Liên hệ
               </a></p>
                        </div>
                        <div id="collapse" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="menu-cap2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end accordion-group-->
                </div>
            </div>
            <!--end menu-respon-->
        </div>
    </div>
</div>