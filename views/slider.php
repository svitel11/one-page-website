<div id="slider">
    <div class="slider-text">
        <div class="slider-text-item slider-text-active-item">
            <h1>Fenster und Türen</h1>
            <h3>The standard Lorem Ipsum passage</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
        <div class="slider-text-item">
            <h1>Sonnenschütz</h1>
            <h3>The standard Lorem Ipsum passage</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
        <div class="slider-text-item">
            <h1>Montage</h1>
            <h3>The standard Lorem Ipsum passage</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
    </div>

    <div class="slider-images">
        <div class="slider-box-top-left"></div>
        <div class="slider-box-top-right"></div>
        <div class="slider-box-bottom-left"></div>
        <div class="slider-box-bottom-right"></div>
        <img class="slider-image slider-image-active" src="assets/images/slider/1.png">
        <img class="slider-image" src="assets/images/slider/2.png">
        <img class="slider-image" src="assets/images/slider/3.png">
    </div>
</div>
<div class="slider-menu">
    <div class="slider-menu--item" onClick="gotToSlider(0)"></div>
    <div class="slider-menu--item" onClick="gotToSlider(1)"></div>
    <div class="slider-menu--item" onClick="gotToSlider(2)"></div>
</div>

<script>
    var i = 0;
    var interval = 5000;
    var hideTextTimout = 600;
    var hideImageTimout = 600;
    var inactiveTimeout = 600;
    var sliderLength = document.querySelectorAll('.slider-image').length;
    var buttons = document.querySelectorAll('.slider-menu--item');
    var sliderImages = document.querySelectorAll('.slider-image');
    var sliderTexts = document.querySelectorAll('.slider-text-item');
    var sliderInterval = setInterval(slider, interval);

    document.querySelectorAll('.slider-menu--item')[i].style.backgroundColor = "#382924";
    if (i === 0) {
        setTimeout(function(){
            document.querySelector('.slider-text-active-item').classList.add('slider-text-hide-item');
            document.querySelector('.slider-image-active').classList.add('slider-image-inactive');
        }, interval - hideTextTimout)
    }

    //get the position or idx of the current active slider
    function getIdxActiveSlider() {
        var sliders = document.querySelectorAll('.slider-image');
        for (let i = 0; i <= sliders.length; i++) {
            if (sliders[i].className.indexOf('active') > -1) {
                return i;
            }
        }
    }

    //slider change
    function sliderChangeStyle(sliderImages, idx, classNameActive, classNameInactive) {
        if (sliderImages[idx].className.indexOf('active')) {
            document.querySelector('.' + classNameActive).classList.remove(classNameInactive);
            sliderImages[idx].classList.remove(classNameActive);
            if (idx === sliderImages.length - 1) {
                sliderImages[0].classList.add(classNameActive);
            } else {
                sliderImages[idx + 1].classList.add(classNameActive);
            }
        }
    }

    function sliderMenuColorChange() {
        var activeSliderIdx = getIdxActiveSlider();
        for (let i = 0; i < sliderLength; i++) {
            document.querySelectorAll('.slider-menu--item')[i].style.backgroundColor = "#c5a862";
        }
        document.querySelectorAll('.slider-menu--item')[activeSliderIdx].style.backgroundColor = "#382924";
    }

    //
    function gotToSlider(idx) {
        /*document.querySelector('.slider-image-active').classList.add('slider-image-inactive');
        document.querySelector('.slider-text-active-item').classList.add('slider-text-hide-item');

        document.querySelector('.slider-image-active').classList.remove('slider-image-active');
        document.querySelector('.slider-text-active-item').classList.remove('slider-text-active-item');
        setTimeout(function(){
            document.querySelector('.slider-image-inactive').classList.remove('slider-image-inactive');
            document.querySelector('.slider-text-hide-item').classList.remove('slider-text-hide-item');
            sliderImages[idx].classList.add('slider-image-active');
            sliderTexts[idx].classList.add('slider-text-active-item');
            sliderMenuColorChange();
            i = idx;
        }, inactiveTimeout)*/
        i = idx;
        clearInterval(sliderInterval);
        slider();
        setTimeout(function () {
            sliderInterval = setInterval(slider, interval)
        })
    }

    function slider(){
        //slider images
        var sliderImages = document.querySelectorAll('.slider-image');
        var sliderTexts = document.querySelectorAll('.slider-text-item');

        //change images in slider
        sliderChangeStyle(sliderImages, i, 'slider-image-active', 'slider-image-inactive');
        setTimeout(function(){
            document.querySelector('.slider-image-active').classList.add('slider-image-inactive');
        }, interval - hideImageTimout)

        //change text in slider
        sliderChangeStyle(sliderTexts, i, 'slider-text-active-item', 'slider-text-hide-item');
        setTimeout(function(){
            document.querySelector('.slider-text-active-item').classList.add('slider-text-hide-item');
        }, interval - hideTextTimout)

        //slider menu
        sliderMenuColorChange();


        i = (i === sliderImages.length - 1) ? 0 : i + 1;
    }

</script>