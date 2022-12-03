<template>
    <div class="container">
        <div class="bg-white shadow rounded">

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="p-5">

                        <form class="user" id="examForm" @submit.prevent="createExam">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">exam_name</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp" placeholder=""
                                            name="exam_name">

                                    </div>
                                    <div class="form-group">
                                        <label for="">subject</label>
                                        <input type="text" class="form-control form-control-user" id="subject"
                                            name="subject"
                                            placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="">duration</label>
                                        <input type="time" class="form-control form-control-user" id="duration"
                                            aria-describedby="emailHelp" placeholder="duration..." name="duration">
                                    </div>
                                    <div class="form-group">
                                        <label for="">question_no</label>
                                        <input type="number" class="form-control form-control-user" id="question_no"
                                            name="question_no"
                                            placeholder="question_no">
                                    </div>

                                    <div class="form-group">
                                        <label for="">mark</label>
                                        <input type="number" class="form-control form-control-user" id="mark"
                                            name="mark"
                                            aria-describedby="emailHelp" placeholder="mark">
                                    </div>
                                </div>
                                <div class="col-md-6">


                                    <label for="">instructor_name</label>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="instructor_name"
                                            name="instructor_name"
                                            placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="">co_instructor_name</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="co_instructor_name" aria-describedby="emailHelp"
                                            name="co_instructor_name"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">credits</label>
                                        <input type="number" class="form-control form-control-user" id="credits"
                                            name="number"
                                            placeholder="">
                                    </div>



                                    <div class="form-group">
                                        <label for="">room_no</label>
                                        <input type="number" class="form-control form-control-user" id="room_no"
                                            name="number"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                <br>
                                    <button type="submit" class="mt-2 btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

    const createExam=async()=>{
        let form = document.getElementById('examForm');
        let formData=new FormData(form);
        console.log(formData);
    }
</script>