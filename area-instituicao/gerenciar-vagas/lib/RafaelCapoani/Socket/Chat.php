<?php

namespace Rafa\Socket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface
{
    protected $clients;
    protected $clientsData;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->clientsData = [];
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);

        // Adicionar informações sobre o cliente conectado
        $this->clientsData[$conn->resourceId] = [
            'name' => 'Nome do Cliente',
            'style' => 'style1' // estilo para o cliente
        ];

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $senderData = $this->clientsData[$from->resourceId];
        $messageData = [
            'senderName' => $senderData['name'],
            'message' => $msg,
            'senderStyle' => $senderData['style']
        ];
        $message = json_encode($messageData);

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($message);
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        unset($this->clientsData[$conn->resourceId]);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
?>