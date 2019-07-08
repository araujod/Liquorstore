package ca.douglas.liquorstoreapp.Model;

public class CheckUserResponse {
    private boolean exists;
    private String erro_msg;

    public CheckUserResponse() {
    }

    public boolean isExists() {
        return exists;
    }

    public void setExists(boolean exists) {
        this.exists = exists;
    }

    public String getErro_msg() {
        return erro_msg;
    }

    public void setErro_msg(String erro_msg) {
        this.erro_msg = erro_msg;
    }
}
