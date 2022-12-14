@extends('client.layout.main')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>/</li>
                            <li>contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!--contact area start-->
    <div class="contact_area">
        <div class="container">
            <x-alert/>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>contact us</h3>
                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                        <ul>
                            <li><i class="fa fa-fax"></i>  Address : No 40 Baria Sreet 133/2 NewYork City</li>
                            <li><i class="fa fa-phone"></i> <a href="#">Infor@roadthemes.com</a></li>
                            <li><i class="fa fa-envelope-o"></i> 0(1234) 567 890</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h3>Tell us your project</h3>
                        <form id="" method="POST"  action="{{route('feedback')}}">
                            @csrf
                            <div>
                                <label> Your Name (required)</label>
                                <input name="name" placeholder="Name *" type="text" value="{{$user->name}}" class="@error('name') is-invalid @enderror">
                            </div>
                            <div>
                                <label>  Your Email (required)</label>
                                <input name="email" placeholder="Email *" type="email" value="{{$user->email}}" class="@error('email') is-invalid @enderror">
                            </div>
                            <div class="contact_textarea">
                                <label>  Your Message</label>
                                <textarea placeholder="Message *" name="message"  class="form-control2  @error('message') is-invalid @enderror" ></textarea>
                            </div>
                            <button type="submit"> Send</button>
                            <p class="form-messege"></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--contact area end-->

    <!--contact map start-->
    <div class="contact_map">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="map-area">
                        <div id="googleMap">
                            <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.7352193685724!2d105.77804671474777!3d21.043277985990535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454cca30c3f95%3A0x9626e09f681b7ea!2zTmcuIDg5IFBo4bqhbSBWxINuIMSQ4buTbmcsIE1haSBE4buLY2gsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1670743443655!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact map end-->
@endsection
@section('footer')
<script>
    $('.is-invalid').keydown(function(){
        $(this).removeClass('is-invalid')
    });
</script>

@endsection
