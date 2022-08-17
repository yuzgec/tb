<li class="col pr-xl-0 px-2 px-sm-3">
    <a href="{{ route('sepet') }}" class="text-gray-90 position-relative d-flex" data-toggle="tooltip" data-placement="top" title="Sepetim">
        <i class="font-size-22 ec ec-shopping-bag"></i>
        <span class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">
            {{ Cart::content()->count() }}
        </span>
        <span class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">{{ Cart::total() }}₺</span>
    </a>
</li>
