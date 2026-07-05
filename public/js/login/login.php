    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para generar las burbujas -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('bubbles-container');
            const colors = [
                'var(--primary-orange)', 
                'var(--neon-blue)',
                'var(--electric-yellow)',
                'var(--hot-pink)',
                'var(--acid-green)'
            ];

            // Crear 30 burbujas de diferentes tamaños
            for (let i = 0; i < 30; i++) {
                const bubble = document.createElement('div');
                bubble.className = 'bubble';
                
                // Tamaño aleatorio entre 30px y 200px
                const size = Math.random() * 170 + 30;
                bubble.style.width = `${size}px`;
                bubble.style.height = `${size}px`;
                
                // Posición inicial aleatoria
                bubble.style.left = `${Math.random() * 100}vw`;
                bubble.style.top = `${Math.random() * 100}vh`;
                
                // Color aleatorio
                bubble.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                
                // Configuración de animación única
                const duration = Math.random() * 30 + 20;
                const delay = Math.random() * 10;
                const floatDistance = Math.random() * 100 + 50;
                
                // Animación personalizada para cada burbuja
                bubble.style.animation = `
                    float ${duration}s ease-in-out ${delay}s infinite,
                    moveX ${duration*1.5}s ease-in-out ${delay}s infinite,
                    moveY ${duration*0.5}s ease-in-out ${delay}s infinite
                `;
                
                // Definir keyframes dinámicos para movimiento horizontal y vertical
                const style = document.createElement('style');
                style.innerHTML = `
                    @keyframes moveX {
                        0%, 100% { transform: translateX(0); }
                        50% { transform: translateX(${floatDistance}px); }
                    }
                    @keyframes moveY {
                        0%, 100% { transform: translateY(0); }
                        50% { transform: translateY(${floatDistance}px); }
                    }
                `;
                document.head.appendChild(style);
                
                container.appendChild(bubble);
            }
        });
    </script>