<form action="login.php" method="post">
                            <img class="mb-4 picshift image-fluid" src="images/logo.png" alt="logo" width="60"
                                height="60">

                            <div class="form-floating fspace">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" name="email">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating fspace">
                                <input type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label>
                            </div>
                            <button class=" btn btn-sm btn-success d-grid gap-2 col-4 mx-auto" type="submit" name="submit">Sign
                                in</button>
                            <p class="mt-5 mb-3 text-muted">© 2021 TIH College Space.</p>
                        </form>