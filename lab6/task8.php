<?php
class SocialMediaService
{
    protected $data;

    public function configureMessage($message)
    {
        $this->data['message'] = $message;
        echo "Social Media Message: {$this->data['message']}" . PHP_EOL;
    }

    public function postUpdate()
    {
        echo "Social media post has been published." . PHP_EOL;
    }
}

interface NotificationHandler
{
    public function prepareData($details);
    public function executeNotification();
}

class SocialMediaAdapter implements NotificationHandler
{
    protected $details;

    public function prepareData($details)
    {
        $this->details = $details;
    }

    public function executeNotification()
    {
        $socialMediaClient = new SocialMediaService();
        $socialMediaClient->configureMessage($this->details['message']);
        $socialMediaClient->postUpdate();
    }
}

class TextMessageService
{
    protected $receiver;
    protected $text;
    protected $scheduleTime;

    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setScheduleTime($time)
    {
        $this->scheduleTime = $time;
    }

    public function deliverText()
    {
        echo "Text Message to {$this->receiver} scheduled at {$this->scheduleTime} with content: {$this->text}<br>" . PHP_EOL;
    }
}

class TextMessageAdapter implements NotificationHandler
{
    protected $details;

    public function prepareData($details)
    {
        $this->details = $details;
    }

    public function executeNotification()
    {
        $textMessageClient = new TextMessageService();
        $textMessageClient->setReceiver($this->details['receiver']);
        $textMessageClient->setText($this->details['message']);

        if (!empty($this->details['time'])) {
            $textMessageClient->setScheduleTime($this->details['time']);
        } else {
            $textMessageClient->setScheduleTime("immediately");
        }

        $textMessageClient->deliverText();
    }
}

interface NotificationProcessor
{
    public function dispatchNotification($details, $method = '');
}

class NotificationDispatcher implements NotificationProcessor
{
    public function dispatchNotification($details, $method = '')
    {
        switch ($method) {
            case "social_media":
                $handler = new SocialMediaAdapter();
                break;
            case "text_message":
                $handler = new TextMessageAdapter();
                break;
            default:
                echo "Error: Unsupported notification method." . PHP_EOL;
                return false;
        }

        $handler->prepareData($details);
        $handler->executeNotification();
    }
}

$data1 = array(
    "receiver" => "+1234567890",
    "message" => "Don't miss your dentist appointment tomorrow at 10 AM.",
    "time" => "2024-11-05 09:00:00"
);

$data2 = array(
    "receiver" => "+0987654321",
    "message" => "Your parcel is on its way!",
    "time" => "2024-11-04 15:30:00"
);

$data3 = array(
    "receiver" => "+1122334455",
    "message" => "Reminder: Team meeting this Friday at 3 PM.",
    "time" => "2024-11-06 08:00:00"
);

$data4 = array(
    "receiver" => "+2233445566",
    "message" => "Your membership will renew on 2024-12-01.",
    "time" => "2024-11-30 18:00:00"
);

$data5 = array(
    "receiver" => "+3344556677",
    "message" => "Celebrate your birthday with a special discount just for you!",
    "time" => "2024-11-04 12:00:00"
);

$dispatcher = new NotificationDispatcher();
$dispatcher->dispatchNotification($data1, "text_message");
$dispatcher->dispatchNotification($data2, "text_message");
$dispatcher->dispatchNotification($data3, "text_message");
$dispatcher->dispatchNotification($data4, "text_message");
$dispatcher->dispatchNotification($data5, "text_message");
?>