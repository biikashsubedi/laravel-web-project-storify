<div class="form-group">
    <label for="title" class="font-weight-bold">Title:</label>
    <input type="text" name="title"
           class="form-control @error('title') is-invalid @enderror" value="{{old('title', $story->title)}}">
    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="body" class="font-weight-bold">Body:</label>
    <textarea name="body" id="" cols="30" rows="5" class="form-control @error('body') is-invalid @enderror ">
        {{old('body', $story->body)}}
    </textarea>
    @error('body')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="type" class="font-weight-bold">Type:</label>
    <select name="type" id="" class="form-control @error('type') is-invalid @enderror">
        <option value="">--Select--</option>
        <option value="short" {{'short' == old('type', $story->type) ? 'selected':''}}>Short</option>
        <option value="long" {{'long' == old('type', $story->type) ? 'selected':''}}>Long</option>
    </select>
    @error('type')
    <span class="invalid-feedback" role="alert">
        {{$message}}
    </span>
    @enderror
</div>
<div class="form-group">
    <legend><h6 class="font-weight-bold">Status:</h6></legend>
    <div class="form-check @error('status') is-invalid @enderror">
        <input type="radio" name="status" id="" class="form-check-input"
               value="1" {{'1' == old('status', $story->status) ? 'checked':''}}>
        <label for="active" class="form-check-label">yes</label>
    </div>
    <div class="form-check">
        <input type="radio" name="status" class="form-check-input"
               value="0" {{'0' == old('status', $story->status) ? 'checked':''}}>
        <label for="active" class="form-check-label">No</label>
    </div>
    @error('status')
    <span class="invalid-feedback">
        {{$message}}
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="image" class="font-weight-bold">Image:</label>
    <input type="file" name="image"
           class="form-control @error('image') is-invalid @enderror">
    @error('image')
    <span class="invalid-feedback" role="alert">
        <strong>{{$message}}</strong>
    </span>
    @enderror
</div>
