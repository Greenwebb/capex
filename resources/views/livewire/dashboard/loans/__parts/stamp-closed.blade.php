<style>
    .stamp {
      position: relative;
      display: inline-block;
      transform: rotate(-12deg);
      color: #0a2e5c;
      font-size: 1.6rem;
      font-weight: 800;
      border: 0.35rem solid #0a2e5c;
      padding: 0.5rem 1.2rem;
      text-transform: uppercase;
      border-radius: 1rem;
      font-family: 'Arial Black', 'Arial Bold', sans-serif;
      background-color: rgba(255, 255, 255, 0.8);
      /* box-shadow: 0 4px 15px rgba(10, 46, 92, 0.3); */
      letter-spacing: 0.05em;
      text-shadow: 1px 1px 1px rgba(10, 46, 92, 0.2);
      backdrop-filter: blur(2px);
      transition: all 0.4s ease;
    }
    
    .stamp:hover {
      transform: rotate(-10deg) scale(1.03);
      box-shadow: 0 6px 20px rgba(10, 46, 92, 0.4);
    }
    
    .stamp:after {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      background-color: #0a2e5c;
      opacity: 0.15;
      border-radius: 0.7rem;
      mix-blend-mode: multiply;
    }
    
    .stamp-container {
      position: relative;
      display: inline-block;
      padding: 15px;
      border-radius: 12px;
      background: linear-gradient(145deg, #ffffff, #f0f8ff);
      /* box-shadow: 0 10px 30px rgba(10, 46, 92, 0.1); */
    }
    
    .stamp-icon {
      margin-right: 10px;
      filter: drop-shadow(1px 1px 1px rgba(10, 46, 92, 0.3));
      animation: pulse 2s infinite;
    }
    
    .stamp-date {
      font-size: 0.85rem;
      display: block;
      text-align: center;
      font-weight: 600;
      margin-top: 5px;
      color: #0a4a8f;
    }
    
    .stamp-glow {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      border-radius: 1rem;
      background: radial-gradient(ellipse at center, rgba(10, 46, 92, 0.2) 0%, rgba(10, 46, 92, 0) 70%);
      pointer-events: none;
      opacity: 0;
      animation: glow 3s ease-in-out infinite;
    }
    
    .card-wrapper {
      background-color: #f9fbff;
      border-radius: 15px;
      padding: 25px;
      /* box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05); */
      border: 1px solid rgba(10, 46, 92, 0.1);
    }
    
    /* Custom animations */
    @keyframes stampIn {
      0% {
        opacity: 0;
        transform: scale(1.7) rotate(-30deg);
      }
      30% {
        opacity: 0.7;
      }
      60% {
        transform: scale(0.95) rotate(-10deg);
      }
      100% {
        opacity: 1;
        transform: scale(1) rotate(-12deg);
      }
    }
    
    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.1);
      }
      100% {
        transform: scale(1);
      }
    }
    
    @keyframes glow {
      0% {
        opacity: 0.2;
        transform: scale(0.95);
      }
      50% {
        opacity: 0.4;
        transform: scale(1.05);
      }
      100% {
        opacity: 0.2;
        transform: scale(0.95);
      }
    }
    
    .stamp-animated {
      animation: stampIn 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }
    
    /* Additional professional elements */
    .dot-pattern {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background-image: radial-gradient(#0a2e5c 1px, transparent 1px);
      background-size: 10px 10px;
      opacity: 0.05;
      border-radius: 1rem;
      pointer-events: none;
    }
    
    .stamp-border {
      position: absolute;
      top: -5px;
      left: -5px;
      right: -5px;
      bottom: -5px;
      border: 2px dashed #0a2e5c;
      border-radius: 1.2rem;
      opacity: 0.15;
      animation: rotate 60s linear infinite;
      pointer-events: none;
    }
  </style>
  <div class="mx-auto col-lg-8">
    <div class="card-wrapper">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="p-4 text-center stamp-container">
              <!-- Enhanced stamp -->
              <div class="stamp stamp-animated">
                <div class="dot-pattern"></div>
                <div class="stamp-border"></div>
                <div class="stamp-glow"></div>
                <i class="bi bi-check-circle-fill stamp-icon"></i>
                LOAN CLOSED
                <span class="stamp-date">April 24, 2025</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Add interactive elements
    document.addEventListener('DOMContentLoaded', function() {
      const stamp = document.querySelector('.stamp');
      
      stamp.addEventListener('mouseover', function() {
        this.style.transition = 'all 0.4s ease';
      });
      
      stamp.addEventListener('mouseout', function() {
        this.style.transition = 'all 0.6s ease';
      });
    });
  </script>