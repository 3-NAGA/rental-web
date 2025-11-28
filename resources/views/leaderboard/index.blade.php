 @vite(['resources/sass/app.scss', 'resources/js/app.js'])
 <div class="container mt-5">
     <h3 class="text-center mb-4 animate__animated animate__fadeInDown">🏆 Leaderboard Affiliator</h3>
     <div class="table-responsive">
         <table class="table table-striped">
             <thead>
                 <tr>
                     <th>Rank</th>
                     <th>User</th>
                     <th>Referral</th>
                     <th>Cashback</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($leaders as $i => $leader)
                     <tr data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                         <td>{{ $i + 1 }}</td>
                         <td>{{ $leader->user->name }}</td>
                         <td>{{ $leader->total_referral }}</td>
                         <td>Rp{{ number_format($leader->total_cashback, 0, ',', '.') }}</td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
 </div>
