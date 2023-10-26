 @php
     $routeName = request()
         ->route()
         ->getName();
 @endphp

 <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('livre.index') }}">Livres</a></li>
         <li class="breadcrumb-item active" aria-current="page">
             @if ($routeName == 'livre.create')
                 Ajouter un livre
             @else
                 Modifier un livre
             @endif
         </li>
     </ol>
 </nav>
