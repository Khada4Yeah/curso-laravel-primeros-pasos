@csrf

<label for="">Título</label>
<input type="text" name="title" id="" value="{{ old('title', $category->title) }}">

<label for="">Slug</label>
<input type="text" name="slug" id="" value="{{ old('title', $category->slug) }}">


<button type="submit">Enviar</button>