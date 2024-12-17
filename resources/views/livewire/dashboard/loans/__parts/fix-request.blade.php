<div class="container">
    <div class="button-container">
        <span id="loanId" style="display:none;">{{ $loan->id }}</span>
        <button id="initializeButton" class="button">
            <span class="button-text">Reset Request</span>
            <div class="button-loader">
                <svg class="spinner" viewBox="0 0 50 50">
                    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                </svg>
            </div>
        </button>
    </div>
    <div class="description-container">
        <p class="description">Clicking this button will initialize the application and prepare it for use.</p>
        <p id="status-message" class="status-message"></p>
    </div>
</div>

<style>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 50vh;
    background-color: #f0f0f0;
    font-family: 'Inter', Arial, sans-serif;
    padding: 20px;
}

.button-container {
    position: relative;
    margin-bottom: 16px;
}

.button {
    font-size: 1.2rem;
    padding: 12px 32px;
    background-color: #ffffff;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 200px;
    position: relative;
    overflow: hidden;
}

.button:not(:disabled):hover {
    background-color: #d80808;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
}

.button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
    transform: none;
}

.button-text {
    transition: opacity 0.3s ease;
}

.button.loading .button-text {
    opacity: 0;
}

.button-loader {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.button.loading .button-loader {
    opacity: 1;
}

.spinner {
    animation: rotate 2s linear infinite;
    width: 24px;
    height: 24px;
}

.path {
    stroke: #ffffff;
    stroke-linecap: round;
    animation: dash 1.5s ease-in-out infinite;
}

@keyframes rotate {
    100% {
        transform: rotate(360deg);
    }
}

@keyframes dash {
    0% {
        stroke-dasharray: 1, 150;
        stroke-dashoffset: 0;
    }
    50% {
        stroke-dasharray: 90, 150;
        stroke-dashoffset: -35;
    }
    100% {
        stroke-dasharray: 90, 150;
        stroke-dashoffset: -124;
    }
}

.description-container {
    max-width: 400px;
    text-align: center;
}

.description {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 8px;
}

.status-message {
    font-size: 0.85rem;
    margin-top: 8px;
    min-height: 20px;
    transition: all 0.3s ease;
}

.status-message.success {
    color: #4CAF50;
}

.status-message.error {
    color: #f44336;
}

/* Loading pulse effect */
@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}

.loading-pulse {
    animation: pulse 1.5s ease-in-out infinite;
}
</style>

<script>
document.getElementById("initializeButton").addEventListener("click", async function() {
    const button = this;
    const loanId = document.getElementById("loanId").textContent;
    const statusMessage = document.getElementById("status-message");

    // Update button state
    button.classList.add("loading");
    button.disabled = true;

    // Update status message
    statusMessage.textContent = "Initializing application...";
    statusMessage.className = "status-message loading-pulse";

    try {
        const response = await fetch('{{ env('APP_URL') }}/api/fix-application', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ loan_id: loanId })
        });

        const data = await response.json();

        if (data.success) {
            statusMessage.textContent = "Initialization successful! Refreshing page...";
            statusMessage.className = "status-message success";
            setTimeout(() => {
                location.reload();
            }, 1000);
        } else {
            throw new Error(data.message || "Failed to initialize application.");
        }
    } catch (error) {
        console.error("Error:", error);
        statusMessage.textContent = error.message || "An error occurred while initializing the application.";
        statusMessage.className = "status-message error";

        // Reset button state
        button.classList.remove("loading");
        button.disabled = false;
    }
});
</script>
