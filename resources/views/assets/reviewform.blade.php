@include('assets.header')
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-4 col-sm-12">
                <div class="entry-form">
                    <form action="{{route('review')}}" method="post">
                        @csrf
                        <h2>Your review</h2>
                        <input type="text" name="name" class="form-control" placeholder="Full name" required="">
            
                        <input type="text" name="job_title" class="form-control" placeholder="Your job title" required="">
            
                        <input type="text" name="review" class="form-control" placeholder="Your review" required="">
            
                        <button class="submit-btn form-control" id="form-submit">Send Review</button>
                    </form>
                </div>
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <h2>
                            {{$error}}
                        </h2>
                    @endforeach
                @endif
                
                <h2>
                    {{session('done')}}
                </h2>
            </div>
        </div>
    </div>
</section>       
@include('assets.footer')

