<!-- Footer -->
<div class="container-fluid bg-light p-5 align-content-center align-items-center mt-5">

    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="row">
                <div class="col-md-4">
                    <i class="icofont-fast-delivery serviceIcon maincolor"></i>
                </div>

                <div class="col-md-8">
                    <h6>Door to Door Delivery</h6>
                    <p class="text-muted" style="font-size: 12px">On-time Delivery</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="row">
                <div class="col-md-4">
                    <i class="icofont-headphone-alt-2 serviceIcon maincolor"></i>
                </div>

                <div class="col-md-8">
                    <h6> Customer Service </h6>
                    <p class="text-muted" style="font-size: 12px">  09-779-999-915 ၊ <br> 09-779-999-913 </p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="row">
                <div class="col-md-4">
                    <i class='bx bx-undo serviceIcon maincolor'></i>
                </div>

                <div class="col-md-8">
                    <h6 > 100% satisfaction </h6>
                    <p class="text-muted" style="font-size: 12px"> 3 days return </p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="row">
                <div class="col-md-4">
                    <i class="icofont-credit-card serviceIcon maincolor"></i>
                </div>

                <div class="col-md-8">
                    <h6> Cash on Delivery </h6>
                    <p class="text-muted" style="font-size: 12px"> Door to Door Service </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

<div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h1> News Letter </h1>
            <p>
                Subscribe to our newsletter and get 10% off your first purchase
            </p>

        </div>

        <div class="offset-2 col-8 offset-2 mt-5">
            <form>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg px-5 py-3" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-top-left-radius: 15rem; border-bottom-left-radius: 15rem">

                    <div class="input-group-append">
                        <button class="btn btn-secondary subscribeBtn" type="button" id="button-addon2"> Subscribe </button>
                    </div>


                </div>
            </form>
        </div>

    </div>
</div>


<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>


<footer class="py-3 mt-5">
    <div class="container">
        <div class="text-center pb-3">
            <a href="#myPage" title="To Top" class="text-white to_top text-decoration-none">
                <i class="icofont-rounded-up" style="font-size: 20px"></i>
            </a>
        </div>

    </div>
</footer>



<script type="text/javascript" src="<?php echo $GLOBALS['view_path'] ?>template/frontend/js/jquery.min.js"></script>
<!-- BOOTSTRAP JS -->
<script type="text/javascript" src="<?php echo $GLOBALS['view_path'] ?>template/frontend/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script type="text/javascript" src="<?php echo $GLOBALS['view_path'] ?>template/frontend/js/custom.js"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="<?php echo $GLOBALS['view_path'] ?>template/frontend/js/owl.carousel.js"></script>

<!--add to card -->
<script type="text/javascript">
    var storeorderurl = "<?php echo $GLOBALS['view_path'] ?>storeorder";
    var successorderurl = "<?php echo $GLOBALS['view_path'] ?>successorder";
</script>
<!--<script-->
<!--        src="https://code.jquery.com/jquery-3.5.1.min.js"-->
<!--        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="-->
<!--        crossorigin="anonymous"></script>-->

<script>
    $(document).ready(function(){
        noti();
        showdata();
        $(".addtocartBtn").click(function (){
            var id=$(this).data('id');
            var name=$(this).data('name');
            var codeno=$(this).data('codeno');
            var price=$(this).data('price');
            var dprice=$(this).data('dprice');
            var photo=$(this).data('photo');

            var items ={
                id:id,
                name:name,
                code:codeno,
                price:price,
                dprice:dprice,
                photo:photo,
                qty:1
            }
            // console.log(items)
            var status = false;
            var  itemlist = localStorage.getItem("msaiitem");
            var itemarray;

            if (itemlist==null){
                itemarray=[];
            }else{
                itemarray = JSON.parse(itemlist);
            }

            // console.log("msai");

            itemarray.forEach(function (v,i){
                // console.log(v.id)
                if (id == v.id){
                    v.qty++;
                    status=true;
                }
            });
            if (status == false){
                itemarray.push(items);
            }
            var itemstring = JSON.stringify(itemarray);

            localStorage.setItem("msaiitem",itemstring);
            showdata();
            noti();
        })
        function showdata(){
            var itemlist = localStorage.getItem("msaiitem");
            if (itemlist){
                var html="";
                var subtotal;
                var total = 0;
                var itemarray = JSON.parse(itemlist);
                // console.log(itemarray);
                itemarray.forEach(function (v,i){
                    var price;
                    var dprice = v.dprice;
                    if (dprice ==""){
                        price= v.price;

                    }else{
                        price= v.dprice;
                    }
                    // console.log(price)


                    subtotal = v.qty*price;
                    total +=subtotal;
                    html += `
                    <tr>
                        <td>
                            <button class="btn btn-outline-danger remove btn-sm" data-id="${i}"  style="border-radius: 50%">
                                <i class="icofont-close-line"></i>
                            </button>
                        </td>
                        <td>
                            <img src="${v.photo}" class="cartImg">
                        </td>
                        <td>
                            <p>${v.name}</p>
                            <p>${v.codeno}</p>
                        </td>
                        <td>
                            <button class="btn btn-outline-secondary plus_btn btnincreasse" data-id="${i}">
                                <i class="icofont-plus"></i>
                            </button>
                        </td>
                        <td>
                            <p>${v.qty}</p>
                        </td>
                        <td>
                            <button class="btn btn-outline-secondary minus_btn btndecreasse" data-id="${i}">
                                <i class="icofont-minus"></i>
                            </button>
                        </td>
                        <td>
                            <p class="text-danger">
                                ${price} Ks
                            </p>
                            <p class="font-weight-lighter">
                                <del> ${v.price} Ks </del> </p>
                        </td>
                        <td>
                            ${subtotal} Ks
                        </td>
                    </tr>`

                });

                $("#shoppingcart_table").html(html);
                $("#mytotal").html("Total: "+total +"Ks");
            }
        }

        function noti(){

            var  itemlist = localStorage.getItem("msaiitem");

            var totalcount=0;
            if (itemlist){

                var itemarray = JSON.parse(itemlist);
                itemarray.forEach(function (v,i){
                    totalcount += v.qty;
                });
                // console.log(totalcount)

                $("#msaitotal").html(totalcount);
            }
        }
        $("#shoppingcart_table").on('click','.btnincreasse', function (){
            // alert("msai")
            var id = $(this).data('id');
            var  itemlist = localStorage.getItem("msaiitem");
            if (itemlist){
                var itemarray = JSON.parse(itemlist);
                itemarray.forEach(function (v,i) {
                    if ( i == id){
                        v.qty++;
                    }
                });

                var itemstring = JSON.stringify(itemarray);
                localStorage.setItem("msaiitem",itemstring);
                showdata();
                noti();

            }

        })
        $("#shoppingcart_table").on('click','.btndecreasse', function (){
            // alert("msai")
            var id = $(this).data('id');
            var  itemlist = localStorage.getItem("msaiitem");
            if (itemlist){
                var itemarray = JSON.parse(itemlist);
                itemarray.forEach(function (v,i) {
                    if ( i == id){

                        v.qty--;
                        if (v.qty == 0){
                            ans = confirm("Are You sure To remove?")
                            if (ans){
                                itemarray.splice(id,1);
                            }else {
                                v.qty++;
                            }
                        }
                    }
                });

                var itemstring = JSON.stringify(itemarray);
                localStorage.setItem("msaiitem",itemstring);
                showdata();
                noti();

            }

        })


        $("#shoppingcart_table").on('click','.remove', function (){
            // alert("msai")
            var id = $(this).data('id');
            var  itemlist = localStorage.getItem("msaiitem");

            if (itemlist){
                var itemarray = JSON.parse(itemlist);
                itemarray.forEach(function (v,i) {
                    if ( i == id){
                        ans = confirm("Are You sure To remove?")
                        if (ans){
                            itemarray.splice(id,1);
                        }
                    }
                });

                var itemstring = JSON.stringify(itemarray);
                localStorage.setItem("msaiitem",itemstring);
                showdata();
                noti();
            }

        })

        $(".checkoutBtn").click(function (){
            var itemlist = localStorage.getItem("msaiitem");
            var subtotal;
            var total = 0;
            var itemarray = JSON.parse(itemlist);
            var note = $("#notes").val();
            itemarray.forEach(function (v,i){
                var price;
                var dprice = v.dprice;
                if (dprice ==""){
                    price= v.price;

                }else {
                    price = v.dprice;
                }
                subtotal = v.qty*price;
                total +=subtotal;
            });
            // console.log(note)
            $.ajax({
                url : storeorderurl,
                type: 'POST',
                dataType:'default: Intelligent Guess (Other value: xml, json, script, or html)',
                data:{
                    cart : itemarray,
                    total: total,
                    note: note
                },
                success:function(result){
                    alert(result);
                }
            })
            window.location.href = successorderurl;
            localStorage.clear();
        });

    })



</script>
</body>
