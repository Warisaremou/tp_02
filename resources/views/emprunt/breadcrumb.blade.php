 @php
     $routeName = request()
         ->route()
         ->getName();
 @endphp

 <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('emprunt.index') }}">Emprunts</a></li>
         <li class="breadcrumb-item active" aria-current="page">
             @if ($routeName == 'emprunt.create')
                 Ajouter un Emprunt
             @else
                 Modifier un Emprunt
             @endif
         </li>
     </ol>
 </nav>
