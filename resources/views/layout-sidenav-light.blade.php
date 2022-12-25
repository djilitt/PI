@extends('layouts.app')

@section('content')
            <style>
              table tr th, table tr td{
                width: 100%;
                align-items: center;
      
              }
                 .model{ 
                    border-color:#2b6ec4; 
 display: none;
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 170px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  box-shadow: 0 0 10px rgba(0,0,0,0.2);

  font-size: 1.4em ;
                 }
            </style>
            
                <main>
                    
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Export</h1>
                        <ol class="breadcrumb mb-4">
                          
                        </ol>
                        <div class="card mb-4">
                            
                         
                                <button class="btn btn-danger float-end p-2" type="submit">Exporter les Etudiants</button>
                                <select class="p-2 text-light bg-success float-center" name="annee" id="annee" > 
                                    <option value="" selected disabled>Specifie l'annee scolaire</option>
                                    <option value="2020-2021">2020-2021</option>
                                    <option value="2019-2020">2019-2020</option>
                                    <option value="2018-2019">2018-2019</option>
                                    <option value="2017-2018">2017-2018</option> 
                                </select>
                                                            <select name="etat" id="etat" class="p-2 text-light bg-success " >
                                                                <option value="" selected disabled>Specifie l'etablisment</option>
                                                            @foreach ($etats as $etat=>$one )
                                                                <option value="{{ $one->abrev}}">{{$one->abrev}}</option>
                                                            @endforeach
                                                            </select>
                                                            <button type="button" class="btn btn-primary center-block p-2" onclick="model('Modal');">Filtrer vos exports</button>
                                                            <div class="model" style="display: none" id="Modal">
                                                              <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="ModalLabel">Filtrer le Fichier Exporter</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <form onsubmit="onSubmit(event)">
                                                                    
                                                                  <div class="modal-body">
                                                                    
                                                                    <div class="sb-sidenav-menu-heading">Etudiants</div>
                                                                    
                                                                    <input type="checkbox" name="etudiant[]" value="Redoublant">
                                                                    Redoublant
                                                                    <input type="checkbox" name="etudiant[]" value="Niveau">
                                                        Niveau            <input type="checkbox" name="etudiant[]" value="GENRE">
                                                                   genre
                                                                  
                                                                 
                                                                  
                                                                <br>
                                                                <br>
                                                                <div class="sb-sidenav-menu-heading">Etablisment</div>
                                                              <input type="checkbox" name="Etablissement[]" id="" value="privee">
                                                                privee
                                                             <input type="checkbox" name="Etablissement[]" id="" value="public">
                                                                public
                                                             <input type="checkbox" name="Etablissement[]" id="" value="co-tutle">
                                                             co-tutle
                                                                </div>
                                                                <div class="modal-footer">
                                                                 
                                                                  <button type="submit" class="btn btn-primary" class="save">Save changes</button>
                                                                </div>
                                                              </div>
                                                                  </form>
                                                              </div>
                                                            </div>
                                                         
                                                        
                           
  
 
  
                        </div>
                        <div class="card-body">
                        <table  id="datatablesSimple">
                          <thead id="datatablesSimple-head">
                          </thead>
                          <tbody id="datatablesSimple-body">
                  
                          </tbody>
                        </table>
                        </div>
                       
                    </div>
                </main>
               
            <script>
    
         function model(id_model){
var modal = document.getElementById(id_model);


var span = document.getElementsByClassName("close")[0];
save=  document.getElementsByClassName('save')
                    

    modal.style.display = "block";


    span.onclick = function() {
  modal.style.display = "none";
}   

save.onclick = function() {
  modal.style.display = "none";
}


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
}

            </script>
   @if (isset($alldata))
   <script>
    ins= @json($alldata)
   </script>                  
   @endif
   <script>
                  const iterate = (obj) => {
            
                    
              
              var result = Object.keys(obj)[0];
            
            if (result[0]==0){
            
              numbers.push(Object.keys(obj).length)
            }
            else{
            Object.keys(obj).forEach(key => {
             
            
            try {
            
            
            
            if (typeof obj[key] === 'object' && obj[key] !== null ) throw "exit";
            
            
            }
            catch (e) {
              headeres.push(key)
            iterate(obj[key])
            
            }
            
            })}
            }
            lists = {}
            
            
                  function onSubmit(event) {
                  
            t=document.getElementById('datatablesSimple')
            
            var body = document.createElement('tbody');
            var head = document.createElement('thead');
            body.setAttribute('id','datatablesSimple-body');
            head.setAttribute('id','datatablesSimple-head');
            
            theader=document.getElementById('datatablesSimple-head')
            tbody = document.getElementById('datatablesSimple-body');
            t.replaceChild(body, tbody);
            t.replaceChild(head, theader)
            var grouped = {}
            // document.getElementById('datatablesSimple').style.display='block'
                event.preventDefault();
                var  groups = new FormData(event.target).getAll("etudiant[]");
                headeres=[]
                Object.keys(ins).forEach(key => {
              ins[key].forEach(function (a) {
                      groups
                        .reduce(function (o, g, i) {
                          // take existing object,
                          o[a[g]] = o[a[g]] || (i + 1 === groups.length ? [] : {}); // or generate new obj, or
                          return o[a[g]]; // at last, then an array
                        }, grouped)
                        .push(a);
                    });
                    numbers=[]
                    iterate(grouped)
                    lists[key]=numbers
            
            var tr = document.createElement('tr');
            var td = document.createElement('td');
            td.innerHTML=Object.keys(lists)[0]
            tr.appendChild(td)
            lists[Object.keys(lists)[0]].forEach(num=>{
              t=document.createElement('td')
              t.innerHTML=num
              tr.appendChild(t)
            })
            body.appendChild(tr)
            })
            a=grouped
            first=true
            groups.forEach(cat => {
             f= hedd(first,cat,a)
            //  console.log(" f est ",f);
             a= f[1]
             first = f[2]
            // console.log(a);
            head.appendChild(f[0])
            })
            li(head,groups)
            }
            
            
            function hedd(first,cat,a) {
              ret = []
              trh =document.createElement('tr')
              var th = document.createElement('th');
                th.innerHTML=cat
                trh.appendChild(th)
            
                if(first){
                  
                  Object.keys(a).forEach(key => {
                    
                var th = document.createElement('th');
                th.innerHTML=key
            
              trh.appendChild(th)
              ret.push(a[key])
            }
              )
              first=false
            
              return [trh,ret,first]
                }
            
            a.forEach(key=>{
            var result = Object.keys(a)[0];
            
            
            if (result[0]!==0){
              
              Object.keys(key).forEach(h => {
              
                
                var th = document.createElement('th');
                th.innerHTML=h
            
            
              trh.appendChild(th)
              ret.push(key[h])
            
            })}})
            
            return[trh,ret,first]
            
            }
            
            
            function li(head,groups)
            {
              trs= head.querySelectorAll('tr')
              var l=[]
              trs.forEach(tr => {
               l.push(tr.cells.length-1)})
             
              i=l.sort(function(a, b){return b - a})[0];
            
               trs.forEach(tr => {
              
                ths=tr.querySelectorAll('th')
              
                ths.forEach(th => {
                  if(!groups.includes(th.innerHTML)){
                  
                 
                  th.colSpan=(i/(tr.cells.length-1))}
                  
                });
               
              });
            
            
             
            
            };
            
            
            
            
            
            
            
            
            
            function ExportToExcel(type, fn, dl) {
                var elt = document.getElementById('datatablesSimple');
                var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
                return dl ?
                    XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
                    XLSX.writeFile(wb, fn || ('one.' + (type || 'xlsx')));
            }
            
            
            
            
                </script>
            @endsection