
// burger
const burgerbtn = document.getElementById('burgerbtn')
const burgerclose = document.getElementById('closeburger')
const burgermenu = document.querySelector('.burgermenu')

burgerbtn.addEventListener('click', function(){
    burgermenu.style.display = 'flex';
})

burgerclose.addEventListener('click', function(){
    burgermenu.style.display = 'none'
})

if(window.screen.availWidth > 767){
    burgermenu.style.display = 'none'
}


// выпадающее меню header
const cataloglink = document.getElementById('cataloglink')
const catalogselection = document.querySelector('.catalog-link-selection')


cataloglink.addEventListener('mouseover', function(){
    if(window.screen.width>767 && window.screen.width<1200)
    {
        catalogselection.style.display = 'none'
    }else{
        catalogselection.style.display = (catalogselection.style.display=='flex') ? 'none' : 'flex'
    }

})


catalogselection.addEventListener('mouseleave', function(){
    catalogselection.style.display = 'none'
})





// modal

var modal = document.getElementById("modal");
var openmodal = document.querySelectorAll(".openmodal");
var closemodal = document.getElementById("closemodal");



        openmodal.forEach(open => {
            open.addEventListener('click', function () {
                modal.style.display = "block";
            })
        });

        closemodal.addEventListener('click', function () {
            modal.style.display = "none";
        })

    if(sessionStorage.getItem('scriptRun')) {
        setTimeout(function () {
            modal.style.display = "block";
        }, 7000)

        sessionStorage.setItem('scriptRun', true)
    }







// accordion
const question = document.getElementsByClassName("question-head")

if(question){
    for(let i = 0; i<question.length; i++){
        question[i].addEventListener('click', function(){
            this.classList.toggle("activepanel")
            const panel = this.nextElementSibling
            if(panel.style.maxHeight){
                panel.style.maxHeight = null
            }else{
                panel.style.maxHeight = panel.scrollHeight + "px"
            }
        })
    }
}



// sort
const sort = document.getElementsByClassName("sort-head");
const sortstyle = document.querySelector(".sort-head")
if(sort){
    for(let i = 0; i<sort.length; i++){
        sort[i].addEventListener('click', function(){
            this.classList.toggle("activesort")
            const panel = this.nextElementSibling
            if(panel.style.maxHeight){
                panel.style.maxHeight = null
                sortstyle.style.borderRadius = "20px";
            }else{
                panel.style.maxHeight = panel.scrollHeight + "px"
                sortstyle.style.borderRadius = "20px 20px 0px 0px";
            }
        })
    }
}



// order
const orderbtn = document.getElementsByClassName('orderdetail')
if(orderbtn){
    for(let i = 0; i<orderbtn.length; i++){
        orderbtn[i].addEventListener('click', function(){
            let orderBody = document.getElementsByClassName('order-body');

            // const panel = this.nextElementSibling
            if(orderBody[i].style.maxHeight){
                orderBody[i].style.maxHeight = null
            }else{
                orderBody[i].style.maxHeight = orderBody[i].scrollHeight + "px"
            }
        })
    }
}


let tabs = document.querySelectorAll('.tabs')
let tab = document.querySelectorAll('.tab')

if (tabs){
    for (let i = 0; i < tab.length; i++) {
        tab[i].addEventListener('click', function() {
            let rem = document.querySelector('.nutrients-active')
            rem.classList.remove('nutrients-active');
            tab[i].classList.add('nutrients-active');
            for (let j = 0; j < tabs.length; j++) {
                if(i == j){
                    tabs[j].classList.remove('nevidno')

                }
                else{
                    tabs[j].classList.add('nevidno')
                }


            }
        })

    }
}


// parallax
const primg1 = document.getElementById('primg1');
const primg2 = document.getElementById('primg2');
const divisor = 20; // Число, на которое будет делиться позиция курсора

if(primg1) {
    if (window.screen.width > 1199) {
        document.addEventListener('mousemove', (e) => {
            const x = e.clientX / divisor;
            const y = e.clientY / divisor;

            primg1.style.transform = `translate(${x}px, ${y}px)`;
            primg2.style.transform = `translate(${x}px, ${y}px)`;
        });
    }
}



var input = document.getElementById('phone-number');
if(input){
    var checkoutform = document.querySelector('.checkoutform');
    var phonelabel = document.getElementById('phone-validation');
    var cleave = new Cleave(input, {
        numericOnly: true,
        blocks: [2, 0, 3, 3, 2, 2], // блоки для номера телефона
        delimiters: ['', '(', ')', '-', '-'], // разделители для форматирования
        prefix: '+7', // префикс для номера телефона
        delimiterLazyShow: true,
        noImmediatePrefix: true,
        onValidationError: function(errors, event) {
            event.preventDefault(); // Предотвращаем отправку формы
            phonelabel.textContent = 'Неверный формат номера телефона.';
        }
    });

}


// Добавляем обработчик отправки формы





