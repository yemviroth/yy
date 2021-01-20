<div class=" d-sm-none list pt-3 text-center text-kh font-weight-bold">
    <a class="pl-4 {{ (\Request::route()->getName()=='about.index' ? 'active' : '') }}" href="{{route('about.index')}}">
        Branch Story
    </a>

    <a class="pl-4 {{ (\Request::route()->getName()=='ingrediant' ? 'active' : '') }}" href="{{route('brand.index')}}">
        ដំណាងចែកចាយ
    </a>

    <a class="pl-4 {{ (\Request::route()->getName()=='ingrediant' ? 'active' : '') }}" href="{{route('ingrediant')}}">គ្រឿងផ្សំ</a>
</div>