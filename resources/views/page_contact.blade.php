@extends('layouts.page_main')

@section('content')
<section class="mbr-section form1 cid-s9mrYkgQsS" id="form1-27">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    CONTACT FORM
                </h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                    Silahkan masukkan data diri anda, Customer Service kami akan segera menghubungi anda</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                <!---Formbuilder Form--->
                <form action="/contact.html" method="POST" class="mbr-form form-with-styler" data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true" value="DPqZRTuZN7AsJo+awwTjdlILuegF+2KwyO3tud5du//BK3/IpJMpvGPAApP5MSGSIZoVi6dvOmb5NwPthqeD0b3DzGfcvBu2PnGLHEuKvgvxmvcNxXK/ON0gVQAkUxP8">
                    <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Terimakasih, Form Pesanan anda segera kami proses</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                        </div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-md-4  form-group" data-for="name">
                            <label for="name-form1-27" class="form-control-label mbr-fonts-style display-7">Name</label>
                            <input type="text" name="name" data-form-field="Name" required="required" class="form-control display-7" placeholder="Perorangan/Perusahaan" id="name-form1-27">
                        </div>
                        <div class="col-md-4  form-group" data-for="email">
                            <label for="email-form1-27" class="form-control-label mbr-fonts-style display-7">Email</label>
                            <input type="email" name="email" data-form-field="Email" required="required" class="form-control display-7" placeholder="Perorangan/Perusahaan" id="email-form1-27">
                        </div>
                        <div data-for="phone" class="col-md-4  form-group">
                            <label for="phone-form1-27" class="form-control-label mbr-fonts-style display-7">Phone</label>
                            <input type="tel" name="phone" data-form-field="Phone" class="form-control display-7" placeholder="Perorangan/Perusahaan" id="phone-form1-27">
                        </div>
                        <div data-for="message" class="col-md-12 form-group">
                            <label for="message-form1-27" class="form-control-label mbr-fonts-style display-7">Message</label>
                            <textarea name="message" data-form-field="Message" class="form-control display-7" id="message-form1-27"></textarea>
                        </div>
                        <div class="col-md-12 input-group-btn align-center"><button type="submit" class="btn btn-primary btn-form display-4" href="mailto:fahmiakbarprasetya@gmail.com">KIRIM ORDER</button></div>
                    </div>
                </form><!---Formbuilder Form--->
            </div>
        </div>
    </div>
</section>


@endsection
