 <footer class="lp-footer">
     <div class="footer-brand">
         <div class="lp-logo-icon footer-logo-icon">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none">
                 <rect x="12" y="35" width="20" height="50" rx="2" fill="currentColor" />
                 <rect x="38" y="15" width="24" height="70" rx="2" fill="currentColor" />
                 <rect x="68" y="28" width="20" height="57" rx="2" fill="currentColor" />
             </svg>
         </div>
         <strong>Booking</strong>
     </div>
     <nav class="footer-links">
         <a href="#">Beranda</a>
         <a href="#">Privasi</a>
         <a href="#">Syarat</a>
         <a href="#">Kontak</a>
     </nav>
     <p class="footer-copy">© {{ date('Y') }} Booking Madiun. All rights reserved.</p>
 </footer>
 <style>
     .lp-footer {
        font-family: var(--font-primary);
        margin-top: 5rem;
         background-color: var(--secondary, #1e3a5f);
         padding: 1.25rem clamp(1.5rem, 5vw, 4rem);
         display: flex;
         align-items: center;
         justify-content: space-between;
         flex-wrap: wrap;
         gap: 0.75rem;
     }

     .footer-brand {
         display: flex;
         align-items: center;
         gap: 0.5rem;
         color: rgba(255, 255, 255, 0.85);
         font-weight: 700;
         font-size: 0.875rem;
     }

     .footer-logo-icon {
         width: 1.4rem;
         height: 1.4rem;
         color: var(--accent, #10b981);
     }

     .footer-links {
         display: flex;
         gap: 1.25rem;
     }

     .footer-links a {
         font-size: 0.75rem;
         color: rgba(255, 255, 255, 0.38);
         transition: color 0.15s;
     }

     .footer-links a:hover {
         color: rgba(255, 255, 255, 0.8);
     }

     .footer-copy {
         font-size: 0.72rem;
         color: rgba(255, 255, 255, 0.28);
     }

     @media (max-width: 900px) {
         .cards-grid {
             grid-template-columns: 1fr 1fr;
         }

         .testi-grid {
             grid-template-columns: 1fr;
         }
     }

     @media (max-width: 768px) {

         .lp-footer {
             flex-direction: column;
             align-items: flex-start;
             gap: 1rem;
         }
     }
 </style>
