
@section('Title','Create Post')
@push('styless')
@vite("resources/css/styles.css")

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
@endpush

<div>
     <form wire:submit.prevent="save" style="float: left"> 
         <input type="text" wire:model="title">
         <textarea wire:model="content"></textarea>
         <button type="submit" class="btn btn-primary">Save</button>
         <input type='number' wire:model="postID">
         <button type='button' wire:click="fetchByid" class="btn btn-primary">Fetch record by ID</button>
         <div id="layoutSidenav_content">
         <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
        <div class="card-body" style="width: 100%">
         <table id="datatablesSimple" class="table">
             <thead>
                 <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                 </tr>
             </thead>
             <tbody>
                 @if($records)
                     @foreach($records as $record)
                         <tr>
                             <td>{{ $record->id }}</td>
                             <td>{{ $record->title }}</td>
                             <td>{{ $record->content }}</td>
                         </tr>
                     @endforeach
                 @endif
             </tbody>
         </table>
        </div>
    </div>
     </form>
 </div>
 @push('script')
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
 @vite("resources/js/scripts.css")
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
 
 @vite("resources/assets/demo/chart-area-demo.js")
 @vite("resources/assets/demo/chart-bar-demo.js")
 <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
 @vite("resources/js//datatables-simple-demo.js")
 <script src="js/datatables-simple-demo.js"></script>
 @endpush
 