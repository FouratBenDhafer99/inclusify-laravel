
<div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
    <div class="card-body d-flex align-items-center p-4">
        <h4 class="fw-700 mb-0 font-xssss text-grey-900">Friend Request</h4>
        <a href="/defaultmember" class="fw-600 ms-auto font-xssss text-primary">See all</a>
    </div>
    <div class="wrap" key={index}>
        <div class="card-body d-flex pt-0 ps-4 pe-4 pb-0 bor-0">
            <figure class="avatar me-3"><img src="{{ asset('frontoffice') }}/images/user.png" alt="avater" class="shadow-sm rounded-circle w45" /></figure>
            <h4 class="fw-700 text-grey-900 font-xssss mt-1">{value.name} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{value.friend} mutual friends</span></h4>
        </div>
        <div class="card-body d-flex align-items-center pt-0 ps-4 pe-4 pb-4">
            <a href="/defaultmember" class="p-2 lh-20 w100 bg-primary-gradiant me-2 text-white text-center font-xssss fw-600 ls-1 rounded-xl">Confirm</a>
            <a href="/defaultmember" class="p-2 lh-20 w100 bg-grey text-grey-800 text-center font-xssss fw-600 ls-1 rounded-xl">Delete</a>
        </div>
    </div>


</div>
