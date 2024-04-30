<div>
    @if ($quizActivee != null && $passs != 1 && $retakingg <= $quizActivee->retake && $start )
        <li class="nav-item" id="timer"><span class="nav-link" id="time">--:--</span></li>
        {{-- <script>
            console.log('lwlwlwlwlwlwl');
            const totalTime = {{ $quizActivee->duration }};
            let timeLeft = totalTime * 60;
            const timerDisplay = document.getElementById('time');

            function updateTimer() {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    timerDisplay.textContent = "Time's up!";
                    document.getElementById('formQuiz').submit();
                } else {
                    timeLeft--;
                }
            }

            const timerInterval = setInterval(updateTimer, 1000);
        </script> --}}
    @endif
</div>
