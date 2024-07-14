@props(['todo'])

<div class="p-4 mb-4 overflow-hidden bg-white border shadow-xl dark:bg-gray-800 dark:text-gray-300 sm:rounded-lg">
    <h3 class="text-lg font-semibold">{{ $todo->title }}</h3>
    <p>{{ $todo->description }}</p>

    <div x-data="{
        timerRunning: {{ json_encode($todo->timer_running) }},
        secondsWorked: {{ $todo->minutes_worked }},
        timerStartedAt: {{ json_encode($todo->timer_started_at) }},
        formattedTime: '00:00:00',
        updateTimer() {
            const form = this.$refs.timerForm;
            fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        _method: 'PATCH'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Response data:', data);
                    this.timerRunning = data.timer_running;
                    this.secondsWorked = data.seconds_worked;
                    this.timerStartedAt = data.timer_started_at;
                    this.formatTime();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        },
        formatTime() {
            let totalSeconds = this.secondsWorked;
            if (this.timerRunning && this.timerStartedAt) {
                const elapsedSeconds = Math.floor((Date.now() - new Date(this.timerStartedAt).getTime()) / 1000);
                totalSeconds += elapsedSeconds;
            }
            const hours = Math.floor(totalSeconds / 3600);
            const minutes = Math.floor((totalSeconds % 3600) / 60);
            const seconds = totalSeconds % 60;
            this.formattedTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }
    }" x-init="setInterval(() => formatTime(), 1000)">
        <p>Debug: Timer Running: {{ $todo->timer_running ? 'Yes' : 'No' }}, Seconds Worked: {{ $todo->minutes_worked }},
            Timer Started At: {{ $todo->timer_started_at }}</p>
        <p x-text="timerRunning ? 'Timer Running: ' + formattedTime : 'Time Logged: ' + formattedTime"></p>

        <form x-ref="timerForm" @submit.prevent="updateTimer"
            x-bind:action="timerRunning ? '{{ route('todos.stopTimer', $todo) }}' : '{{ route('todos.startTimer', $todo) }}'">
            @csrf
            @method('PATCH')
            <x-button x-bind:class="timerRunning ? 'bg-red-500 hover:bg-red-700' : 'bg-green-500 hover:bg-green-700'">
                <span x-text="timerRunning ? 'Stop Timer' : (secondsWorked > 0 ? 'Resume Timer' : 'Start Timer')"></span>
            </x-button>
        </form>
    </div>
</div>
