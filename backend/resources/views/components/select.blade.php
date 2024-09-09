<!-- resources/views/components/select.blade.php -->
@props(['name', 'options'])

<select name="{{ $name }}" class="form-select">
    @foreach ($options as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
</select>
