<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/public/favicon.png">
    <script src="/public/assets/js/cleave.js"></script>
    <script src="/public/assets/js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/public/assets/js/cart.js" defer></script>
    <script src="/public/assets/js/timeout.js" defer></script>

    <title>MyLittlePet</title>
</head>
<body>

    <div class="modal" id="modal" @error('emailsub') style="display:block;" @enderror>
    <div class="modal-items">
        <div class="modal-text">
            <p>Подпишись на рассылку и получай промокоды на заказы!</p>
            <form action="{{ route('sub.store') }}" class="subform" method="post">
                @csrf
                <div class="input-msg">
                    <input type="text" name="emailsub" id="email-input" class="subinput" placeholder="Email" value="{{old('emailsub')}}">
                  @error('emailsub')  <label for="email-input" class="errlabel">{{$message}}</label> @enderror
                </div>
                <input type="submit" value="подписаться" class="subbtn">
                <p>Нажимая подписаться, вы соглашаетесь получать рекламную рассылку</p>
            </form>
        </div>
        <div class="modal-img">
            <img src="/public/assets/imgs/modal/pet.png" alt="">
        </div>
        <img src="/public/assets/imgs/modal/close.png" alt="" id="closemodal" class="modalclose">

    </div>
    </div>


    @include('components.header')

    @error('success') <div class="success-message">{{$message}}</div> @enderror

    @error('success') <script>    let successMessage = document.querySelector('.success-message');
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 2000)
    </script>
    @enderror

    @yield('content')
    @include('components.footer')

    <script src="/public/assets/js/main.js"></script>
</body>
</html>
