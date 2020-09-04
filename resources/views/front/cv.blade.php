@extends('front.front')

@section('content')
    <section id="subheader" data-speed="8" data-type="background"
             style="background-position: 10% 0px;background-image:url('{{ asset('front/images/career-bg.jpg') }}')">

    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Memar-Dizayner</h1>

                    <ul class="crumb">
                        <li><a href="/">Ana səhifə</a></li>
                        <li class="sep">/</li>
                        <li><a href="/az/karyera/">Karyera</a></li>
                        <li class="sep">/</li>
                        <li>Memar-Dizayner</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <script>
        var img_html='{{ asset('front/images/arrow_d1.svg') }}';
    </script>


    <div class="karyera karyera_show">
        <div class="row">


            <form action="" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="vakansiya" value="2903">

                <article>
                    <h3>Şəxsi məlumat</h3>
                    <div class="form_item first_form">
                        <div class="item">
                            <div class="input ">
                                <input  type="text" name="firstname" placeholder="Ad :" value="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="input ">
                                <input   type="text" name="lastname" placeholder="Soyad :" value="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="input ">
                                <input   type="text" name="number" placeholder="Telefon nömrəsi :" value="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="input ">
                                <input   type="text" name="mail" placeholder="E-poçt :" value="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="input ">
                                <input id="cv" type="file" name="cv[]">
                                <label   for="cv">CV Yüklə</label>
                            </div>
                        </div>
                        <div class="item">
                            <div class="input ">
                                <input id="sekil" type="file" name="image[]" >
                                <label   for="sekil">Şəkil yüklə</label>
                            </div>
                        </div>
                    </div>
                </article>

                <div class="clear"></div>

                <article style="margin-top:50px;">
                    <h3>Təhsil</h3>
                    <div class="form_item first_form">
                        <div class="item">
                            <div class="input">
                                <input   type="text" name="tehsil[]" placeholder="Ali təhsil müəssisəsinin adı :" value="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="input bitme_tarix">
                                <select name="tehsil_start[]">
                                    <option value="hide">Başlanğıc ili</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                </select>
                                <select name="tehsil_end[]">
                                    <option value="hide">Bitmə ili</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                </select>
                            </div>
                        </div>
                        <div class="item" style="width: 99%;">
                            <div class="input ">
                                <input class="elave_et" data-id='1' type="button" value="+ Əlavə et">
                            </div>
                        </div>
                    </div>
                </article>

                <div class="clear"></div>

                <article style="margin-top:50px;">
                    <h3>İş təcrübəsi</h3>
                    <div class="form_item first_form">
                        <div class="item">
                            <div class="input ">
                                <input  type="text" name="job[]" placeholder="İş yerinin adı :" value="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="input bitme_tarix">
                                <select name="job_start[]">
                                    <option value="hide">Başlanğıc ili</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                </select>
                                <select name="job_end[]">
                                    <option value="hide">Bitmə ili</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                </select>
                            </div>
                        </div>
                        <div class="item" >
                            <div class="input ">
                                <input  type="text" name="job_position[]" placeholder="Vəzifə və öhdəlikər :" value="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="input ">
                                <input  type="text" name="job_exit[]" placeholder="Çıxma səbəbi :" value="">
                            </div>
                        </div>
                        <div class="item" style="width: 99%;">
                            <div class="input ">
                                <input class="elave_et" data-id='2' type="button" value="+ Əlavə et">
                            </div>
                        </div>
                    </div>
                </article>
                <div class="captcha"><div id="g-recaptcha-5e20df49260fe" class="g-recaptcha" data-id="g-recaptcha-5e20df49260fe" data-hl="" data-sitekey="6Lc_wcYUAAAAAE6-AI4FRZFanyO6GI8ydGsKf5oO" data-theme="light" data-type="image" data-size="normal" data-index="0" ></div><script src='https://www.google.com/recaptcha/api.js' async defer></script></div>

                <article style="float:right;">
                    <input type="submit" name="karyera_add" value="Göndər" style="margin-right:12px;">
                </article>
            </form>

        </div>
    </div>
    <div style="margin-top:40px;"></div>
@endsection
