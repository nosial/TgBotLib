<?php

namespace TgBotLib\Objects;

use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Games\Game;
use TgBotLib\Objects\Payments\Invoice;
use TgBotLib\Objects\Stickers\Sticker;

class ExternalReplyInfo implements ObjectTypeInterface
{
    private MessageOrigin $origin;
    private ?Chat $chat;
    private ?int $message_id;
    private ?LinkPreviewOptions $link_preview_options;
    private ?Animation $animation;
    private ?Audio $audio;
    private ?Document $document;
    private ?PaidMediaInfo $paid_media;
    /**
     * @var PhotoSize[]|null
     */
    private ?array $photo;
    private ?Sticker $sticker;
    private ?Story $story;
    private ?Video $video;
    private ?VideoNote $video_note;
    private ?Voice $voice;
    private bool $has_media_spoiler;
    private ?Contact $contact;
    private ?Dice $dice;
    private ?Game $game;
    private ?Giveaway $giveaway;
    private ?GiveawayWinners $giveaway_winners;
    private ?Invoice $invoice;
    private ?Location $location;
    private ?Poll $poll;
    private ?Venue $venue;

    /**
     * Origin of the message replied to by the given message
     *
     * @return MessageOrigin
     */
    public function getOrigin(): MessageOrigin
    {
        return $this->origin;
    }

    /**
     * Optional. Chat the original message belongs to. Available only if the chat is a supergroup or a channel.
     *
     * @return Chat|null
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * Optional. Unique message identifier inside the original chat. Available only if the original chat is a
     * supergroup or a channel.
     *
     * @return int|null
     */
    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    /**
     * Optional. Options used for link preview generation for the original message, if it is a text message
     *
     * @return LinkPreviewOptions|null
     */
    public function getLinkPreviewOptions(): ?LinkPreviewOptions
    {
        return $this->link_preview_options;
    }

    /**
     * Optional. Message is an animation, information about the animation
     *
     * @return Animation|null
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @return Audio|null
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * Optional. Message is a general file, information about the file
     *
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * Optional. Message contains paid media; information about the paid media
     *
     * @return PaidMediaInfo|null
     */
    public function getPaidMedia(): ?PaidMediaInfo
    {
        return $this->paid_media;
    }

    /**
     * Optional. Message is a photo, available sizes of the photo
     *
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @return Sticker|null
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * Optional. Message is a forwarded story
     *
     * @return Story|null
     */
    public function getStory(): ?Story
    {
        return $this->story;
    }

    /**
     * Optional. Message is a video, information about the video
     *
     * @return Video|null
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * Optional. Message is a video note, information about the video message
     *
     * @return VideoNote|null
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->video_note;
    }

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @return Voice|null
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * Optional. True, if the message media is covered by a spoiler animation
     *
     * @return bool
     */
    public function isHasMediaSpoiler(): bool
    {
        return $this->has_media_spoiler;
    }

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * Optional. Message is a dice with random value
     *
     * @return Dice|null
     */
    public function getDice(): ?Dice
    {
        return $this->dice;
    }

    /**
     * Optional. Message is a game, information about the game.
     *
     * @see https://core.telegram.org/bots/api#games
     * @return Game|null
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * Optional. Message is a scheduled giveaway, information about the giveaway
     *
     * @return Giveaway|null
     */
    public function getGiveaway(): ?Giveaway
    {
        return $this->giveaway;
    }

    /**
     * Optional. A giveaway with public winners was completed
     *
     * @return GiveawayWinners|null
     */
    public function getGiveawayWinners(): ?GiveawayWinners
    {
        return $this->giveaway_winners;
    }

    /**
     * Optional. Message is an invoice for a payment, information about the invoice.
     *
     * @see https://core.telegram.org/bots/api#payments
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * Optional. Message is a native poll, information about the poll
     *
     * @return Poll|null
     */
    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    /**
     * Optional. Message is a venue, information about the venue
     *
     * @return Venue|null
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'origin' => $this->origin->toArray(),
            'chat' => $this->chat?->toArray(),
            'message_id' => $this->message_id,
            'link_preview_options' => $this->link_preview_options?->toArray(),
            'animation' => $this->animation?->toArray(),
            'audio' => $this->audio?->toArray(),
            'document' => $this->document?->toArray(),
            'paid_media' => $this->paid_media?->toArray(),
            'photo' => array_map(fn(PhotoSize $photoSize) => $photoSize->toArray(), $this->photo),
            'sticker' => $this->sticker?->toArray(),
            'story' => $this->story?->toArray(),
            'video' => $this->video?->toArray(),
            'video_note' => $this->video_note?->toArray(),
            'voice' => $this->voice?->toArray(),
            'has_media_spoiler' => $this->has_media_spoiler ?? false,
            'contact' => $this->contact?->toArray(),
            'dice' => $this->dice?->toArray(),
            'game' => $this->game?->toArray(),
            'giveaway' => $this->giveaway?->toArray(),
            'giveaway_winners' => $this->giveaway_winners?->toArray(),
            'invoice' => $this->invoice?->toArray(),
            'location' => $this->location?->toArray(),
            'poll' => $this->poll?->toArray(),
            'venue' => $this->venue?->toArray()
        ];
    }

    /**
     * @inheritDoc
     * @noinspection DuplicatedCode
     */
    public static function fromArray(array $data): ObjectTypeInterface
    {
        $object = new self();

        $object->origin = MessageOrigin::fromArray($data['origin']);
        $object->chat = isset($data['chat']) ? Chat::fromArray($data['chat']) : null;
        $object->message_id = $data['message_id'] ?? null;
        $object->link_preview_options = isset($data['link_preview_options']) ? LinkPreviewOptions::fromArray($data['link_preview_options']) : null;
        $object->animation = isset($data['animation']) ? Animation::fromArray($data['animation']) : null;
        $object->audio = isset($data['audio']) ? Audio::fromArray($data['audio']) : null;
        $object->document = isset($data['document']) ? Document::fromArray($data['document']) : null;
        $object->paid_media = isset($data['paid_media']) ? PaidMediaInfo::fromArray($data['paid_media']) : null;
        $object->photo = isset($data['photo']) ? array_map(fn(array $photo) => PhotoSize::fromArray($photo), $data['photo']) : null;
        $object->sticker = isset($data['sticker']) ? Sticker::fromArray($data['sticker']) : null;
        $object->story = isset($data['story']) ? Story::fromArray($data['story']) : null;
        $object->video = isset($data['video']) ? Video::fromArray($data['video']) : null;
        $object->video_note = isset($data['video_note']) ? VideoNote::fromArray($data['video_note']) : null;
        $object->voice = isset($data['voice']) ? Voice::fromArray($data['voice']) : null;
        $object->has_media_spoiler = $data['has_media_spoiler'] ?? false;
        $object->contact = isset($data['contact']) ? Contact::fromArray($data['contact']) : null;
        $object->dice = isset($data['dice']) ? Dice::fromArray($data['dice']) : null;
        $object->game = isset($data['game']) ? Game::fromArray($data['game']) : null;
        $object->giveaway = isset($data['giveaway']) ? Giveaway::fromArray($data['giveaway']) : null;
        $object->giveaway_winners = isset($data['giveaway_winners']) ? GiveawayWinners::fromArray($data['giveaway_winners']) : null;
        $object->invoice = isset($data['invoice']) ? Invoice::fromArray($data['invoice']) : null;
        $object->location = isset($data['location']) ? Location::fromArray($data['location']) : null;
        $object->poll = isset($data['poll']) ? Poll::fromArray($data['poll']) : null;
        $object->venue = isset($data['venue']) ? Venue::fromArray($data['venue']) : null;

        return $object;
    }
}