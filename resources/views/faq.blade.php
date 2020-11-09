@extends('layout.app')
@section('content')

    <!-- LOAD PAGE -->
  
<!-- BANNER -->
    <div class="section banner-page" data-background="{{asset('images/banner-single.jpg')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{ __('messages.Faqs')}}</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="index.html">{{ __('messages.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.Faqs')}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- FAQS -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">

                <div class="row">
                    
                    <div class="col-12 col-sm-12 col-md-12">
                        
                        <p class="text-black lead">{{ __('messages.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat.')}}</p>

                        <div class="spacer-30"></div>
                        
                        <div class="row">
                            
                            <div class="col-sm-12 col-md-12">
                                <h2 class="section-heading text-primary no-after mb-4">
                                    {{ __('messages.What We Do')}}
                                </h2>

                                <div class="accordion rs-accordion" id="accordionExample">
                                   <!-- Item 1 -->
                                   <div class="card">
                                      <div class="card-header" id="headingOne">
                                         <h3 class="title">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{ __('messages.How do children learn?')}}
                                            </button>
                                         </h3>
                                      </div>
                                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                         <div class="card-body">
                                            {{ __('messages.Create and publilsh dynamic websites for desktop, tablet, and mobile devices that meet the latest web standards- without writing code. Design freely using familiar tools and hundreds of web fonts. easily add interactivity, including slide shows, forms, and more.')}}
                                         </div>
                                      </div>
                                   </div>
                                   <!-- Item 2 -->
                                   <div class="card">
                                      <div class="card-header" id="headingTwo">
                                         <h3 class="title">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            {{ __('messages.When can I enroll?')}}
                                            </button>
                                         </h3>
                                      </div>
                                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                         <div class="card-body">
                                            {{ __("messages.Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.")}}
                                         </div>
                                      </div>
                                   </div>
                                   <!-- Item 3 -->
                                   <div class="card">
                                      <div class="card-header" id="headingThree">
                                         <h3 class="title">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            {{ __('messages.How successful are children when they graduate from Kids?')}}
                                            </button>
                                         </h3>
                                      </div>
                                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                         <div class="card-body">
                                            <p>{{ __("messages.Unzip the file, locate Html file and double click the file and you will directly to adobe Html. Next step you can modifications our template, you can customize color, text, font, content, logo and image with your need using familiar tools on adobe Html without writing any code.")}}</p>
                                            <p>{{ __("messages.You can't re-distribute the Item as stock, in a tool or template, or with source files. You can't re-distribute or make available the Item as-is or with superficial modifications. These things are not allowed even if the re-distribution is for Free.")}}</p>
                                         </div>
                                      </div>
                                   </div>
                                   <!-- Item 4 -->
                                   <div class="card">
                                      <div class="card-header" id="headingFour">
                                         <h3 class="title">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            {{ __('messages.What security measures are in place at Kids?')}}
                                            </button>
                                         </h3>
                                      </div>
                                      <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                         <div class="card-body">
                                            <p>{{ __("messages.Unzip the file, locate Html file and double click the file and you will directly to adobe Html. Next step you can modifications our template, you can customize color, text, font, content, logo and image with your need using familiar tools on adobe Html without writing any code.")}}</p>
                                            <p>{{ __("messages.You can't re-distribute the Item as stock, in a tool or template, or with source files. You can't re-distribute or make available the Item as-is or with superficial modifications. These things are not allowed even if the re-distribution is for Free.")}}</p>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <!-- end accordion -->

                                <p class="uk21 mt-5 text-black"><a href="{{url('/contact')}}">{{ __("messages.Can't find your answer?. Contact us now!")}}</a></p>

                            </div>
                            

                        </div>
                    
                    </div>

                </div>

            </div>
        </div>
    </div>




@endsection