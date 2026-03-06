@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Trang quản lý</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Trang chủ</li>
                <li class="breadcrumb-item active">Trang chủ</li>
            </ol>
        </nav>
    </div>

<style>
 .typing {
    font-size: 2rem;
    font-weight: bold;
    white-space: nowrap;
    border-right: 3px solid #333;
    padding-right: 5px;
    animation: blink 0.7s step-end infinite;
}

@keyframes blink {
    50% { border-color: transparent; }
}

</style>


    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body vh-100 d-flex justify-content-center align-items-center"> 
                    <div class="fs-2 typing" ></div>
                </div>
            </div>
        </div>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    const text = "Chào Mừng đến với trang quản lý";
    const typingDiv = document.querySelector(".typing");
    let i = 0;
    let isDeleting = false;

    function typeEffect() {
        if (!isDeleting) {
            typingDiv.textContent = text.substring(0, i + 1);
            i++;
            if (i === text.length) {
                setTimeout(() => isDeleting = true, 1000); 
            }
        } else {
            typingDiv.textContent = text.substring(0, i - 1);
            i--;
            if (i === 0) {
                isDeleting = false;
            }
        }
        setTimeout(typeEffect, isDeleting ? 100 : 150);
    }

    typeEffect();
});
</script>

@endsection
