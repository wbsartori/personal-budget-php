<input type="hidden" class="form-control" id="_id" name="_id" value="{{isset($records->id) ? $records->id : ''}}">
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id"
                   value="{{isset($records->id) ? $records->id : ''}}" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="name">Nome completo:</label>
            <input type="text" class="form-control" maxlength="100" id="name" name="name"
                   value="{{isset($records->name) ? $records->name : ''}}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="birthDate">Data de nascimento:</label>
            <input type="date" class="form-control" maxlength="100" id="birthDate" name="birthDate"
                   value="{{isset($records->birthDate) ? $records->birthDate : ''}}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 form-group">
        <label for="gender">Genêro:</label>
        <select class="form-select" aria-label="Default select example" id="gender" name="gender">
            @if(isset($records->gender) && $records->gender === "M")
                <option value="M">Masculino</option>
            @elseif(isset($records->gender) && $records->gender === "F")
                <option value="M">Feminino</option>
            @endif
            <option>--------</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" maxlength="100" id="email" name="email"
                   value="{{isset($records->email) ? $records->email : ''}}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label class="mt-3" for="status">Status:</label>
        <label for="status"></label>
        <div class="form-check form-switch">
            @if(isset($records->email) && $records->status == 'A')
                <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                <span class="badge text-bg-success">Ativo</span>
            @else
                <input class="form-check-input" type="checkbox" id="status" name="status">
                <span class="badge text-bg-danger">Inativo</span>
            @endif
        </div>
    </div>
</div>
