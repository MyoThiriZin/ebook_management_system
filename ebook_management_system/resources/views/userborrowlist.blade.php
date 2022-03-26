@extends('users.layouts.master')

@section('content')

<!--<h2 class="form-title">Borrow List</h2>-->

<div class="wrapper">
  <form action="" method="POST" class="form-control">
  @csrf
  <div class="container-borrowlist-suan">
<div class="clearfix">
					<div class="ul-borrowbook-suan">
						<ul>
							<li class="li-booklist-suan">
								<img src="img/b2.jpg" class="img-borrowli-suan" alt="Book cover photo">
								<h2 class="head-borrowli-suan">Book Name</h2><br>
                <div class="lbl-borrowgp-suan">
                <label>Author: </label><br>
                <label>Category: </label><br>
                  <label>Duration: </label><br>
                    <label>Borrowed Date: </label><br>
                  <label>Due Date: </label><br>
                  </div>
                <button class="btn-read-suan"><i class="fa-solid fa-book-open"><a href=""></a></i>&nbsp;Read</button>
							</li>
              <li class="li-booklist-suan">
								<img src="img/b2.jpg" class="img-borrowli-suan" alt="Book cover photo">
								<h2 class="head-borrowli-suan">Book Name</h2><br>
                <div class="lbl-borrowgp-suan">
                <label>Author: </label><br>
                <label>Category: </label><br>
                  <label>Duration: </label><br>
                    <label>Borrowed Date: </label><br>
                  <label>Due Date: </label><br>
                  </div>
                <button class="btn-read-suan"><i class="fa-solid fa-book-open"><a href=""></a></i>&nbsp;Read</button>
							</li>
              <li class="li-booklist-suan">
								<img src="img/b2.jpg" class="img-borrowli-suan" alt="Book cover photo">
								<h2 class="head-borrowli-suan">Book Name</h2><br>
                <div class="lbl-borrowgp-suan">
                <label>Author: </label><br>
                <label>Category: </label><br>
                  <label>Duration: </label><br>
                    <label>Borrowed Date: </label><br>
                  <label>Due Date: </label><br>
                  </div>
                <button class="btn-read-suan"><i class="fa-solid fa-book-open"><a href=""></a></i>&nbsp;Read</button>
							</li>
              <li class="li-booklist-suan">
								<img src="img/b2.jpg" class="img-borrowli-suan" alt="Book cover photo">
								<h2 class="head-borrowli-suan">Book Name</h2><br>
                <div class="lbl-borrowgp-suan">
                <label>Author: </label><br>
                <label>Category: </label><br>
                  <label>Duration: </label><br>
                    <label>Borrowed Date: </label><br>
                  <label>Due Date: </label><br>
                  </div>
                <button class="btn-read-suan"><i class="fa-solid fa-book-open"><a href=""></a></i>&nbsp;Read</button>
							</li>
              <li class="li-booklist-suan">
								<img src="img/b2.jpg" class="img-borrowli-suan" alt="Book cover photo">
								<h2 class="head-borrowli-suan">Book Name</h2><br>
                <div class="lbl-borrowgp-suan">
                <label>Author: </label><br>
                <label>Category: </label><br>
                  <label>Duration: </label><br>
                    <label>Borrowed Date: </label><br>
                  <label>Due Date: </label><br>
                  </div>
                <button class="btn-read-suan"><i class="fa-solid fa-book-open"><a href=""></a></i>&nbsp;Read</button>
							</li>
              <li class="li-booklist-suan">
								<img src="img/b2.jpg" class="img-borrowli-suan" alt="Book cover photo">
								<h2 class="head-borrowli-suan">Book Name</h2><br>
                <div class="lbl-borrowgp-suan">
                <label>Author: </label><br>
                <label>Category: </label><br>
                  <label>Duration: </label><br>
                    <label>Borrowed Date: </label><br>
                  <label>Due Date: </label><br>
                  </div>
                <button class="btn-read-suan"><i class="fa-solid fa-book-open"><a href=""></a></i>&nbsp;Read</button>
							</li>
  
						</ul>
					</div>
</div>
  </div>
<div>
</div>
  </form>
</div>

@endsection