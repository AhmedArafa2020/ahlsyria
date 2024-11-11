<div class="ot-bradcam-area footer-bg">
    <div class="container">
        <div class="ot-bradcam-inner">
            <div class="row">
                <div class="col-xl-12">
                    <div class="ot-bradcam-inner-wrapper">
                        <div class="bradcam-text">
                            <h3 class="title font-700 text-white">
                                <span style="font-weight: 500">
                                    {{ @$breadcumb_title }}
                                </span>
                                @if(isset($breadcumb_sub_title) && !empty($breadcumb_sub_title))
                                    .
                                    {{$breadcumb_sub_title}}
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
