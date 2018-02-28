<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="row">
            @foreach($categories->chunk(2) as $category)
                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    @if($loop->index !== 1)
                        @foreach($category as $item)
                            @if($loop->first)
                                <div class="block1 hov-img-zoom pos-relative m-b-30">
                                    <img src="{{ $item->imageUrl }}" alt="{{ $item->name }}"
                                         style="width: 370px; height: 479px;">
                                    <div class="block1-wrapbtn w-size2">
                                        <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                            {{ $item->name }}
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="block1 hov-img-zoom pos-relative m-b-30">
                                    <img src="{{ $item->imageUrl }}" alt="{{ $item->name }}"
                                         style="width: 370px; height: 339px;">
                                    <div class="block1-wrapbtn w-size2">
                                        <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                            {{ $item->name }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        @foreach($category as $item)
                            @if($loop->first)
                                <div class="block1 hov-img-zoom pos-relative m-b-30">
                                    <img src="{{ $item->imageUrl }}" alt="{{ $item->name }}"
                                         style="width: 370px; height: 339px;">
                                    <div class="block1-wrapbtn w-size2">
                                        <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                            {{ $item->name }}
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="block1 hov-img-zoom pos-relative m-b-30">
                                    <img src="{{ $item->imageUrl }}" alt="{{ $item->name }}"
                                         style="width: 370px; height: 479px;">
                                    <div class="block1-wrapbtn w-size2">
                                        <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                            {{ $item->name }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>