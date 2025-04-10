@extends('layouts.admin')
@section('contents')
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede"><i class="fa fa-edit px-1"></i> Update MonyBox </h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div
      class=" card-body ">
      <form action="{{ route('update-monyBox-info') }}" method="POST">
        <input type="hidden" name="id" value="{{ $m_box->id }}">
        @csrf
        <div class="input-group sm mb-2">
                      <label class="input-group-text" for="name">Name</label>
                      <input type="text" class="form-control sm" name="name" id="name" value="{{old('name',$m_box)}}">
                      
                  
                      <label class="input-group-text" for="date"> Date</label>
                      <input type="text" value="{{ old('date',$m_box) }}"  class="fc-datepicker form-control sm " name="date" id="date">
                    </div>
                    <div class="input-group sm mt-2">
                      <label class="input-group-text" for="last_isal_exhcange">Last Exhcange</label>
                      <input type="text" class="form-control sm" name="last_isal_exhcange" id="last_isal_exhcange" value="{{old('last_isal_exhcange',$m_box)}}">
                      <label class="input-group-text" for="last_isal_collect">Last Collection</label>
                      <input type="text" class="form-control sm" name="last_isal_collect" id="last_isal_collect"  value="{{old('last_isal_collect',$m_box)}}">
                      
                    
        <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Reset form to original values">
          <i class="fas fa-undo me-1"></i> Reset
        </button>
        <button type="submit" class="input-group-text btn py-0 btn-primary" data-bs-toggle="tooltip"
          data-bs-placement="top" title="Save order Info changes">
          <i class="fas fa-save me-1"></i> Update
        </button>
    </div>


  </div>




  </form>
  </div>

  </div>
</fieldset>
@endsection