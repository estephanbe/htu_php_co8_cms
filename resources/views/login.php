<div class="container my-5 w-50">
    <h1 class="text-center my-3">Login To Admin Dashboard</h1>
    <form method="POST" action="/login">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control" />
            <label class="form-label" for="email">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" name="password" id="password" class="form-control" />
            <label class="form-label" for="password">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <!-- <div class="row mb-4">
            <div class="col d-flex justify-content-center"> -->
                <!-- Checkbox -->
                <!-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me" checked />
                    <label class="form-check-label" for="remember_me"> Remember me </label>
                </div>
            </div>
        </div> -->

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
    </form>
</div>