<template>
    <div class="time__box">
       <p>{{displayDays}}</p>
       <p>{{displayHours}}</p>
       <p>{{displayMinutes}}</p>
       <p>{{displaSeconds}}</p>
    </div>
</template>

<script >
export default{
    data() {
        return {
            
                 displayDays: 0,
                 displayHours: 0,
                 displayMinutes: 0,
                 displaSeconds: 0
            
        }
    },
    computed:{
        _seconds:()=>1000,
        _minutes(){
            return this._seconds*60;
        },
        _hours(){
            return this._minutes*60;
        },
        _days(){
            return this._hours*24;
        }
    },
    methods:{
        showRemining(){
            const timer=setInterval(()=>{
                const now=new Date();
                const end=new Date(2022, 10, 14, 12, 0, 10, 10);
                const distance=end.getTime()- now.getTime();
                if(distance<0){
                    clearInterval(timer)
                    alert("finsi time");
                    return 
                }

                const days=Math.floor(distance/this._days);
                const hours=Math.floor((distance % this._days)/this._hours)
                const minutes=Math.floor((distance % this._hours)/this._minutes)
                const seconds=Math.floor((distance % this._minutes)/this._seconds)

                this.displayMinutes=    minutes<10?'0'+minutes:minutes;
                this.displaSeconds=     seconds<10?'0'+seconds:seconds;
                this.displayHours=     hours<10?'0'+hours:hours;
                this.displayDays=     days<10?'0'+days:days;
            },1000)
        }
    }, 
    mounted() {
        this.showRemining()
    },
}

</script>